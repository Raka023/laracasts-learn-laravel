<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(5);

        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:128|string',
            'salary' => 'required',
        ]);

        Job::create([
            'employer_id' => User::first()->id,
            'title' => $request->title,
            'salary' => $request->salary,
        ]);

        return to_route('jobs.index');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job,
        ]);
    }

    public function update(Job $job, Request $request)
    {
        $request->validate([
            'employer_id' => 'required|integer',
            'title' => 'required|min:3|max:128|string',
            'salary' => 'required',
        ]);

        $job->update([
            'title' => $request->title,
            'salary' => $request->salary,
        ]);

        return redirect("/jobs/{$job->id}");
    }

    public function destroy(Job $job)
    {
        $job->delete();
        // Job::destroy($job->id);

        return to_route('jobs.index');
    }
}
