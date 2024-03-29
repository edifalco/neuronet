<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activities = \App\Activity::latest()->limit(4)->get();
        $deliverables = \App\Deliverable::latest()->limit(4)->get();
        $publications = \App\Publication::latest()->limit(4)->get();
        $contacts = \App\Contact::latest()->limit(4)->get();
        $tools = \App\Tool::latest()->limit(4)->get();
        $documents = \App\Document::latest()->limit(4)->get();
        $highlightsmetrics = \App\HighlightsMetric::all()->sortBy('order');
        $partnersmetrics = \App\PartnersMetric::all();
        $projectsmetrics = \App\ProjectsMetric::all()->sortBy('name');
        $countriesmetrics = \App\CountriesMetric::all()->sortBy('name');
        $contactscategories = \App\ContactCategory::all();
        //$projects = \App\Project::all()->sortBy('name');
        $projects = \App\Project::where([
            ['id', '!=', 24], ['id', '!=', 28], ['id', '!=', 29], ['id', '!=', 30],
        ])->orderBy('name')->get();
        $scheduleprojects = \App\Project::where([
            ['id', '!=', 24], ['id', '!=', 28], ['id', '!=', 29], ['id', '!=', 30],
        ])->orderBy('start_date')->get();
        //dd($scheduleprojects);
        //exit;
        $events = \App\Calendar::where('end_date','>=',today())->orderBy('start_date')->limit(4)->get();

        //colors
        //Purple: "rgba(155,109,235,1)"
        //Pink: "rgba(229,14,106,1)"
        //Aqua: "rgba(18,238,227,1)"
        //Violet: "rgba(198,59,178,1)"
        //Indigo: "rgba(58,9,97,1)"

        //Metric Colors
        $colors_original = ["rgba(58,9,97,1)","rgba(155, 109, 235, 1)","rgba(198, 59, 178, 1)","rgba(18, 238, 227, 1)","rgba(229, 14, 106, 1)","rgba(58,9,97,1)","rgba(18, 238, 227, 1)","rgba(198, 59, 178, 1)","rgba(155, 109, 235, 1)","rgba(229, 14, 106, 1)"];
        $colors = ["rgba(155,109,235,1)","rgba(229,14,106,1)","rgba(18,238,227,1)","rgba(198,59,178,1)","rgba(58,9,97,1)"];

        $labels_second = ["indigo","purple","indigo","purple","indigo","purple"];
        $labels_all_available_colors = ["indigo","purple","violet","pink","aqua","indigo"];
        $labels = ["purple","aqua","pink","purple","aqua","pink"];

        //echo $labels[0];
        //exit;

        return view('admin.dashboard', compact( 'activities', 'deliverables', 'publications', 'contacts', 'tools', 'documents','highlightsmetrics','partnersmetrics','projectsmetrics','countriesmetrics','contactscategories','colors','labels','projects','scheduleprojects','events'));
    }
}
