<?php

namespace Tests\Feature;

use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_home_page_with_recent_jobs()
    {
        $this->seed();

        $response = $this->get(route('home'));

        $response->assertOk();

        $jobs = Job::latest()->limit(3)->get();

        foreach ($jobs as $job) {
            $response->assertSeeText($job->title);
            $response->assertSeeText($job->company->name);
        }
    }
}
