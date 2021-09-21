<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class NetworkDiagramsController extends Controller
{
    public function projects()
    {
        return view('admin.network_diagrams.projects');
    }

    public function participantsAll()
    {
        return view('admin.network_diagrams.participants_all');
    }

    public function participantsEfpia()
    {
        return view('admin.network_diagrams.participants_efpia');
    }

    public function participantsAcademic()
    {
        return view('admin.network_diagrams.participants_academic');
    }

    public function publications()
    {
        return view('admin.network_diagrams.publications');
    }
}
