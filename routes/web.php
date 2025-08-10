<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

// Jobs Routes
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(5);

    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    return view('jobs.show', [
        'job' => Job::find($id)
    ]);
});

Route::post('/jobs', function () {
    $validated = request()->validate([
        'employer_id' => 'required|integer',
        'title' => 'required|min:3|max:128|string',
        'salary' => 'required',
    ]);

    Job::create($validated);

    return redirect('/jobs');
});

Route::get('/jobs/{id}/edit', function ($id) {
    return view('jobs.edit', [
        'job' => Job::find($id)
    ]);
});

Route::patch('/jobs/{id}', function ($id) {
    $validated = request()->validate([
        'employer_id' => 'required|integer',
        'title' => 'required|min:3|max:128|string',
        'salary' => 'required',
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
    ]);

    return redirect("/jobs/{$job->id}");
});

Route::delete('/jobs/{id}', function ($id) {
    Job::findOrFail($id)->delete();
    // Job::destroy($id);
    return redirect('/jobs');
});
//

Route::get('/contact', function () {
    return view('contact');
});
