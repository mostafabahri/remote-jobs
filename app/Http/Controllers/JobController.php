<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view(
            'single',
            ['job' => $job->load(
                ['company' => function ($query) {
                    $query->withCount('jobs');
                }]
            )
        ]
        );
    }
}
