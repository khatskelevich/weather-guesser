<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cities extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return \App\Models\Cities::getTemperature();
    }
}
