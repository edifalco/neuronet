<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class NetworkMapsController extends Controller
{
    public function projects()
    {
        return view('admin.network_maps.projects');
    }

    public function partners()
    {
        return view('admin.network_maps.partners');
    }
}
