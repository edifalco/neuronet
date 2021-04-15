<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Deliverable;
use App\Document;
use App\Partner;
use App\Project;
use App\Publication;
use App\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class PluginsController extends Controller
{
    public function index ()
    {
        return view('plugins.index');
    }

    public function assetsmap()
    {
        $asset_maps = \App\AssetMap::all();
        return view('plugins.asset_map', compact('asset_maps'));
    }

    public function decisiontool()
    {
        $decision_tools = \App\DecisionTool::all();
        return view('plugins.decision_tool', compact('decision_tools'));
    }

    public function deliverables($proj_id=null)
    {
        if (request()->ajax()) {
            $query = Deliverable::query();
            $query->with("project");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('deliverable_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'deliverables.id',
                'deliverables.deliverable_number',
                'deliverables.title',
                'deliverables.project_id',
                'deliverables.submission_date',
                'deliverables.link',
                'deliverables.keywords',
            ]);

            $project_id = request('project_id');
            if( $project_id != null) {
                $query->where('project_id', $project_id)->orderBy('deliverable_number')->get();
            } else {
                $query->orderBy('project_id')->orderBy('deliverable_number');
            }

            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'deliverable_';
                $routeKey = 'admin.deliverables';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('deliverable_number', function ($row) {
                return $row->deliverable_number ? $row->deliverable_number : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('project.name', function ($row) {
                return $row->project ? $row->project->name : '';
            });
            $table->editColumn('submission_date', function ($row) {
                return $row->submission_date ? $row->submission_date : '';
            });
            $table->editColumn('link', function ($row) {
                if($row->link) { return '<a href="'. $row->link .'" target="_blank">' . $row->link . '</a>'; };
            });
            $table->editColumn('keywords', function ($row) {
                return $row->keywords ? $row->keywords : '';
            });

            $table->rawColumns(['actions','massDelete','link']);

            return $table->make(true);
        }

        $projects = \App\Project::all()->sortBy('name');
        $project_name = \App\Project::where('id',$proj_id)->value('name');
        return view('plugins.deliverables', compact('projects','project_name'));
    }

    public function documents()
    {
        if (request()->ajax()) {
            $query = Document::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('document_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'documents.id',
                'documents.title',
                'documents.source',
                'documents.publication_date',
                'documents.keywords',
                'documents.file',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'document_';
                $routeKey = 'admin.documents';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('source', function ($row) {
                return $row->source ? $row->source : '';
            });
            $table->editColumn('publication_date', function ($row) {
                return $row->publication_date ? $row->publication_date : '';
            });
            $table->editColumn('keywords', function ($row) {
                return $row->keywords ? $row->keywords : '';
            });
            $table->editColumn('file', function ($row) {
                if($row->file) { return '<a href="'.asset(env('UPLOAD_PATH').'/img/'.$row->file) .'" target="_blank">Download file</a>'; };
            });

            $table->rawColumns(['actions','massDelete','file']);

            return $table->make(true);
        }

        return view('plugins.documents');
    }

    public function events($all_eve=null)
    {
        if (request()->ajax()) {
            $query = Calendar::query();
            $query->with("color");
            $query->with("projects");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('calendar_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'calendars.id',
                'calendars.title',
                'calendars.location',
                'calendars.start_date',
                'calendars.end_date',
                'calendars.color_id',
                'calendars.link',
            ]);

            $all_events = request('all_events');
            if($all_events == 1) {
                $query->orderBy('start_date')->get();
            } else {
                $query->where('end_date','>=',now())->orderBy('start_date');
            }

            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'calendar_';
                $routeKey = 'admin.calendars';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('location', function ($row) {
                return $row->location ? $row->location : '';
            });
            $table->editColumn('start_date', function ($row) {
                return $row->start_date ? $row->start_date : '';
            });
            $table->editColumn('end_date', function ($row) {
                return $row->end_date ? $row->end_date : '';
            });
            $table->editColumn('color.color', function ($row) {
                return $row->color ? $row->color->color : '';
            });
            $table->editColumn('projects.name', function ($row) {
                if(count($row->projects) == 0) {
                    return '';
                }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $row->projects->pluck('name')->toArray()) . '</span>';
            });
            $table->editColumn('link', function ($row) {
                if($row->link) { return '<a href="'. $row->link .'" target="_blank">' . $row->link . '</a>'; };
            });

            $table->rawColumns(['actions','massDelete','projects.name', 'link']);

            return $table->make(true);
        }

        return view('plugins.events', compact('all_eve'));
    }

    public function metrics()
    {
        $highlightsmetrics = \App\HighlightsMetric::all()->sortBy('order');
        $partnersmetrics = \App\PartnersMetric::all();
        $projectsmetrics = \App\ProjectsMetric::all()->sortBy('name');
        $countriesmetrics = \App\CountriesMetric::all()->sortBy('name');
        $colors = ["rgba(155,109,235,1)","rgba(229,14,106,1)","rgba(18,238,227,1)","rgba(198,59,178,1)","rgba(58,9,97,1)"];
        return view('plugins.metrics', compact('highlightsmetrics', 'partnersmetrics', 'projectsmetrics', 'countriesmetrics', 'colors'));
    }

    public function networkdiagrams()
    {
        return view('plugins.network');
    }

    public function partners($proj_id=null)
    {
        if (request()->ajax()) {
            $query = Partner::query();
            $query->with("projects");
            $query->with("type_of_institution");
            $query->with("country");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('partner_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'partners.id',
                'partners.name',
                'partners.type_of_institution_id',
                'partners.country_id',
            ]);

            $project_id = request('project_id');
            if( $project_id != null) {
                $projId =[$project_id];
                $query->whereHas('projects', function($q) use($projId) {
                    $q->whereIn('id', $projId);
                })->orderBy('name')->get();
            } else {
                $query->orderBy('name')->get();
            }

            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'partner_';
                $routeKey = 'admin.partners';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('projects.name', function ($row) {
                if(count($row->projects) == 0) {
                    return '';
                }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $row->projects->pluck('name')->toArray()) . '</span>';
            });
            $table->editColumn('type_of_institution.name', function ($row) {
                return $row->type_of_institution ? $row->type_of_institution->name : '';
            });
            $table->editColumn('country.title', function ($row) {
                return $row->country ? $row->country->title : '';
            });

            $table->rawColumns(['actions','massDelete','projects.name']);

            return $table->make(true);
        }

        $projects = \App\Project::all();
        $project_name = \App\Project::where('id',$proj_id)->value('name');
        return view('plugins.partners', compact('projects','project_name'));
    }

    public function projects()
    {
        $projects = \App\Project::all()->sortBy('name');
        return view('plugins.projects', compact('projects'));
    }

    public function publications($proj_id=null)
    {
        if (request()->ajax()) {
            $query = Publication::query();
            $query->with("project");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('publication_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'publications.id',
                'publications.title',
                'publications.first_author_last_name',
                'publications.year',
                'publications.project_id',
                'publications.link',
                'publications.keywords',
            ]);

            $project_id = request('project_id');
            if( $project_id != null) {
                $query->where('project_id', $project_id)->orderBy('id')->get();
            } else {
                $query->orderBy('project_id')->orderBy('id');
            }

            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'publication_';
                $routeKey = 'admin.publications';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('first_author_last_name', function ($row) {
                return $row->first_author_last_name ? $row->first_author_last_name : '';
            });
            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : '';
            });
            $table->editColumn('project.name', function ($row) {
                return $row->project ? $row->project->name : '';
            });
            $table->editColumn('link', function ($row) {
                if($row->link) { return '<a href="'. $row->link .'" target="_blank">' . $row->link . '</a>'; };
            });
            $table->editColumn('keywords', function ($row) {
                return $row->keywords ? $row->keywords : '';
            });

            $table->rawColumns(['actions','massDelete', 'link']);

            return $table->make(true);
        }

        $projects = \App\Project::all()->sortBy('name');
        $project_name = \App\Project::where('id',$proj_id)->value('name');
        return view('plugins.publications', compact('projects','project_name'));
    }

    public function schedule()
    {
        $scheduleprojects = \App\Project::orderBy('start_date')->get();
        return view('plugins.schedule', compact('scheduleprojects'));
    }

    public function tools($proj_id=null)
    {
        if (request()->ajax()) {
            $query = Tool::query();
            $query->with("project");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('tool_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'tools.id',
                'tools.name',
                'tools.project_id',
                'tools.publication_date',
                'tools.type_of_data_available',
                'tools.description',
                'tools.keywords',
                'tools.link',
            ]);

            $project_id = request('project_id');
            if( $project_id != null) {
                $query->where('project_id', $project_id)->get();
            }

            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'tool_';
                $routeKey = 'admin.tools';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('project.name', function ($row) {
                return $row->project ? $row->project->name : '';
            });
            $table->editColumn('publication_date', function ($row) {
                return $row->publication_date ? $row->publication_date : '';
            });
            $table->editColumn('type_of_data_available', function ($row) {
                return $row->type_of_data_available ? $row->type_of_data_available : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('keywords', function ($row) {
                return $row->keywords ? $row->keywords : '';
            });
            $table->editColumn('link', function ($row) {
                if($row->link) { return '<a href="'. $row->link .'" target="_blank">' . $row->link . '</a>'; };
            });

            $table->rawColumns(['actions','massDelete','link']);

            return $table->make(true);
        }

        $projects = \App\Project::all()->sortBy('name');
        $project_name = \App\Project::where('id',$proj_id)->value('name');
        return view('plugins.tools', compact('projects','project_name'));
    }
}
