<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

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

    public function store()
    {
        $validated = request()->validate([
            'employer_id' => 'required|integer',
            'title' => 'required|min:3|max:128|string',
            'salary' => 'required',
        ]);

        Job::create($validated);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job,
        ]);
    }

    public function update(Job $job)
    {
        $validated = request()->validate([
            'employer_id' => 'required|integer',
            'title' => 'required|min:3|max:128|string',
            'salary' => 'required',
        ]);

        $job->update([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
        ]);

        return redirect("/jobs/{$job->id}");
    }

    public function destroy(Job $job)
    {
        $job->delete();
        // Job::destroy($id);
        return redirect('/jobs');
    }
}
