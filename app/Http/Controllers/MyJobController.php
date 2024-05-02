<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
class MyJobController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer');
    }

    public function index(){
        return view('my_job.index', ['jobs'=>auth()->user()->employer->jobs()->with(['employer','jobApplications','jobApplications.user'])->latest()->get()]);
    }

    public function create(){
        return view('my_job.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', Job::$experience),
            'category' => 'required|in:' . implode(',', Job::$category)
        ]);

        $request->user()->employer->jobs()->create($validated);
        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully.');
    }
}
