<?php

namespace App\Http\Controllers;

use App\Job;

class CheckoutController extends Controller
{
    public function __invoke($job)
    {
        $job = Job::findDraft($job);

        return view('jobs.checkout', compact('job'));
    }
}