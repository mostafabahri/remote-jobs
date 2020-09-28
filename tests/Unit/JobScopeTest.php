<?php

namespace Tests\Unit;

use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobScopeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function job_starts_out_as_draft()
    {
        $job = factory(Job::class)->create();

        $this->assertTrue($job->draft());
    }

    /** @test */
    public function job_can_be_published()
    {
        $job = factory(Job::class)->create();

        $job->publish();

        $this->assertFalse($job->draft());
    }

    /** @test */
    public function job_will_be_globlly_scoped_to_only_published_jobs()
    {
        $jobs = factory(Job::class, 2)->state('published')->create();
        $aDraftJob = factory(Job::class)->create();

        $this->assertEquals(2, Job::count());
        $this->assertNull(Job::find($aDraftJob->id));
    }

    /** @test */
    public function job_can_get_with_draft()
    {
        $jobs = factory(Job::class, 2)->state('published')->create();
        $aDraftJob = factory(Job::class)->create();

        $this->assertEquals(3, Job::withDraft()->count());
    }

    /** @test */
    public function job_can_get_only_draft()
    {
        $jobs = factory(Job::class, 2)->state('published')->create();
        $aDraftJob = factory(Job::class)->create();

        $this->assertEquals(1, Job::onlyDraft()->count());
    }

    /** @test */
    public function find_draft_method_finds_among_draft_jobs()
    {
        $aDraftJob = factory(Job::class)->create();

        $this->assertNotNull(Job::findDraft($aDraftJob->id));
    }
}
