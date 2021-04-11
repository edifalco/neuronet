<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function deliverables()
    {
        $deliverables = \App\Deliverable::latest()->limit(4)->get();
        return view('plugins.deliverables', compact('deliverables'));
    }

    public function documents()
    {
        $documents = \App\Document::latest()->limit(4)->get();
        return view('plugins.documents', compact('documents'));
    }

    public function events()
    {
        $events = \App\Calendar::where('end_date','>=',now())->orderBy('start_date')->limit(4)->get();
        return view('plugins.events', compact('events'));
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

    public function projects()
    {
        $projects = \App\Project::all()->sortBy('name');
        return view('plugins.projects', compact('projects'));
    }

    public function publications()
    {
        $publications = \App\Publication::latest()->limit(4)->get();
        return view('plugins.publications', compact('publications'));
    }

    public function schedule()
    {
        $scheduleprojects = \App\Project::orderBy('start_date')->get();
        return view('plugins.schedule', compact('scheduleprojects'));
    }

    public function tools()
    {
        $tools = \App\Tool::latest()->limit(4)->get();
        return view('plugins.tools', compact('tools'));
    }
}
