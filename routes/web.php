<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Laravel Developer',
                'salary' => '$10,000',
            ],
            [
                'id' => 2,
                'title' => 'Vue Developer',
                'salary' => '$8,000',
            ],
            [
                'id' => 3,
                'title' => 'React Developer',
                'salary' => '$9,000',
            ],
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Laravel Developer',
            'salary' => '$10,000',
        ],
        [
            'id' => 2,
            'title' => 'Vue Developer',
            'salary' => '$8,000',
        ],
        [
            'id' => 3,
            'title' => 'React Developer',
            'salary' => '$9,000',
        ],
    ];

    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
