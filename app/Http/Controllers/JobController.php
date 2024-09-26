<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->simplePaginate(20);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function show($id)
    {
        $job = Job::with('employer')->findOrFail($id);
        return view('jobs.show', ['job' => $job]);
    }
}
