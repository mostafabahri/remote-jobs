<?php

namespace Tests\Integration\Stripe;

use App\Payment\StripePayment;
use Livewire\Livewire;
use Tests\TestCase;

class LivewireStripeCheckoutTest extends TestCase
{
    /** @test */
    public function can_create_sessions()
    {
        $this->mock(StripePayment::class, function ($mock) {
            $mock->shouldReceive('initiate')
                ->withArgs([
                    ['client_reference_id' => 10]
                ])
                ->once()
                ->andReturn(['id' => 'cs_test_123']);
        });

        Livewire::test(
            \App\Http\Livewire\StripeCheckout::class,
            ['clientRef' => 10]
        )
            ->call('createSession')
            ->assertEmitted('sessionCreated', 'cs_test_123');
    }
}
