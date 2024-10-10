<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth; // Add this line
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class JobController extends Controller
{
    public function create()
    {
        $employers = Employer::all(); // Fetch all employers
        return view('jobs.create', compact('employers')); // Pass employers to the view
    }
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(6);
        \Illuminate\Support\Facades\Log::info('Jobs data:', $jobs->items()); // Log the jobs data
        return view('jobs.index', compact('jobs'));
    }

    public function update($id)
    {
        request() -> validate([
            'title' => ['required', 'min:3'],
            'salary' =>['required']
        ]);
        $job = Job::findOrFail($id);
        $job -> update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect('/jobs/'.$job->id);
    }

    public function edit(Job $job)
    {
        Gate::define('edit-job', function (User $user, Job $job){
return $job->employer->user->is($user);
        });
            
        Gate::authorize('edit-job', $job);
      
        return view('jobs.edit', ['job'=> $job]);
    }
    

    public function show($id)
    {
        $job = Job::find($id);
        return view('jobs.show', ['job' => $job]);
    }

    public function store(Request $request)
       {
           $request->validate([
               'title' => 'required|string|max:255',
               'salary' => 'required|numeric', // Validate salary
               'description' => 'required|string', // Validate description
               'company' => 'required|string|max:255',
               'location' => 'required|string',
               'employer_id' => 'required|exists:employers,id',
           ]);

           Job::create($request->all()); // Ensure salary is included in the request
           return redirect()->route('jobs.index');
       }

    public function destroy(Job $job){
        $job->delete();
    return redirect('/jobs');
    }
}
