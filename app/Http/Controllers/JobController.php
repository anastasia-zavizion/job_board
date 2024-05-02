<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny',Job::class);
        $jobs = Job::with('employer')->latest()->filter($request->only(['search','min_salary','max_salary','experience','category']));
        return view('jobs.index', ['jobs' => $jobs->get()]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $this->authorize('view',$job);
        return view('jobs.show',['job'=>$job->load(['employer.jobs'])]);
    }
}
