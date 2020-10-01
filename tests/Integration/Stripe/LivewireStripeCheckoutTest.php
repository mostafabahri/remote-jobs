<?php

namespace Tests\Integration\Stripe;

use App\Payment\CheckoutFlow;
use Livewire\Livewire;
use Tests\TestCase;

class LivewireStripeCheckoutTest extends TestCase
{
    /** @test */
    public function can_create_sessions()
    {
        $this->mock(CheckoutFlow::class, function ($mock) {
            $mock->shouldReceive('initiate')
                ->withArgs([['reference' => 10]])
                ->once()
                ->andReturn(['id' => 'cs_test_123']);
        });

        Livewire::test(
            \App\Http\Livewire\StripeCheckout::class,
            ['reference' => 10]
        )
            ->call('createSession')
            ->assertEmitted('sessionCreated', 'cs_test_123');
    }
}
