<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer');
    }

    public function index(){
        return view('my_job.index');
    }
}
