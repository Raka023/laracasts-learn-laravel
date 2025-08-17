<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $job = Auth::user()->employer->jobs()->create([
            'title' => $request->title,
            'salary' => $request->salary,
        ]);

        Mail::to($job->employer->user)->queue(new JobPosted($job));

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

        return to_route('jobs.index');
    }
}
