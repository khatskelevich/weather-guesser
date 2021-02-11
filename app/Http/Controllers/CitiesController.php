<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return \App\Models\Cities::index();
    }
}
