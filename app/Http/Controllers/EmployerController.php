<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'company_name'=>'required|min:2|max:30|unique:employers,company_name'
        ]);
        $request->user()->employer()->create($validated);
        return redirect()->route('jobs.index')->with('success','You were registered as an employer');
    }

}
