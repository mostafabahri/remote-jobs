<?php

namespace Tests\Feature;

use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_checkout_page_for_draft_job()
    {
        $job = factory(Job::class)->create();

        $this->get(route('checkout', ['job' => $job->id]))
            ->assertOk();
    }
}
