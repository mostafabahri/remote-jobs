<?php

namespace Tests\Integration\Stripe;

use App\Job;
use App\Payment\CheckoutFlow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StripeReturnTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function stripe_success_returns_without_errors()
    {
        $job = factory(Job::class)->state('published')->create();

        $this->mock(
            CheckoutFlow::class,
            fn ($mock) =>
            $mock->shouldReceive('referenceForSessionId')
                ->withArgs(['cs_ok'])
                ->andReturn($job->id)
        );

        $this->get(route('stripe.return.success', ['session_id' => 'cs_ok']))
            ->assertOk();
    }

    /** @test */
    public function stripe_cancel_returns_to_home_page()
    {
        $this->get(route('stripe.return.cancel', ['session_id' => 'cs_failed']))
            ->assertRedirect(route('home'));
    }
}
