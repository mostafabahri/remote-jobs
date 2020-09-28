<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;

class JobController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        $job->loadDetails();

        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create',
            ['job' => new Job(), 'action' => route('jobs.store'), 'method' => 'POST']);
    }

    public function store()
    {
        $this->validateRequest();
        $job = Job::make(request('job'));

        $job->company = Company::create(request('company'));

        $job->save();

        return view('jobs.preview', compact('job'));
    }

    public function edit($job)
    {
        $job = Job::findDraft($job);
        return view('jobs.create', ['job' => $job, 'action' => route('jobs.update', $job->id), 'method' => 'PUT']);
    }

    public function update($job)
    {
        $this->validateRequest();

        $job = Job::findDraft($job);
        $job->loadDetails();

        $job->update(request('job'));
        $job->company->update(request('company'));

        return view('jobs.preview', compact('job'));
    }

    protected function validateRequest()
    {
        return request()->validate([
            'job.title' => 'required',
            'job.region' => 'required',
            'job.description' => 'required',
            'job.instructions' => 'required',
            'company.name' => 'required',
            'company.logo' => 'nullable|image|max:1024',
            'company.location' => 'required',
            'company.website' => 'required|url',
        ]);
    }
}
