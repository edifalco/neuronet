<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $activities = \App\Activity::latest()->limit(4)->get();
        $deliverables = \App\Deliverable::latest()->limit(7)->get();
        $publications = \App\Publication::latest()->limit(4)->get();
        $contacts = \App\Contact::latest()->limit(5)->get();
        $documents = \App\Document::latest()->limit(7)->get();
        $partnersmetrics = \App\PartnersMetric::all();
        $projectsmetrics = \App\ProjectsMetric::all();
        $contactscategories = \App\ContactCategory::all();
        
        //Metric Colors
        $colors = ["rgba(0, 166, 90, 1)","rgba(221, 75, 57, 1)","rgba(243, 156, 18, 1)","rgba(0, 192, 239, 1)","rgba(60, 141, 188, 1)","rgba(245, 105, 84, 1)","rgba(210, 214, 222, 1)","rgba(0, 31, 63, 1)","rgba(57, 204, 204, 1)","rgba(96, 92, 168, 1)","rgba(255, 133, 27, 1)","rgba(17, 17, 17, 1)"];

        $labels = ["primary","info","success","warning","danger","primary","info","success","warning","danger"];

        //echo $labels[0];
        //exit;


        
        
        return view('home', compact( 'activities', 'deliverables', 'publications', 'contacts', 'documents','partnersmetrics','projectsmetrics','contactscategories','colors','labels'));
    }
}
