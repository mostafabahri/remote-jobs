<?php

namespace Tests\Feature;

use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowJobsTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_jobs_page()
    {
        $this->seed();

        $job = Job::first();
        $response = $this->get(route('jobs.show', $job->id));

        $response->assertOk();

        $response->assertSee($job->title);
        $response->assertSee($job->description);

        $response->assertSee($job->company->name);
    }
}
