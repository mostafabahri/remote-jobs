<?php

namespace Tests\Feature;

use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowJobsTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_jobs_page()
    {
        $this->seed();

        $job = Job::first();
        $response = $this->get(route('jobs.show', $job->id));

        $response->assertOk();

        $response->assertSee($job->title);
        $response->assertSee($job->description);

        $response->assertSee($job->company->name);
    }

    public function test_return_404_when_job_not_found()
    {
        $this->seed();

        $response = $this->get(route('jobs.show', 200000));

        $response->assertNotFound();
    }
}
