<?php

namespace Tests\Integration\Stripe;

use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StripeWebhookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function job_becomes_visible_with_stripe_checkout_hook()
    {
        $job = factory(Job::class)->create();

        $this->withoutMiddleware()->postJson('/api/webhook', $this->sampleEventHook($job->id))
            ->assertStatus(200);

        $this->assertJobIsVisible($job->id);
    }

    /** @test */
    public function providing_no_signature_results_in_bad_requset()
    {
        $this->postJson('/api/webhook', [])
            ->assertStatus(400);
    }
    /** @test */
    public function providing_invalid_signature_results_in_bad_request()
    {
        $this->postJson('/api/webhook', [], ['stripe-signature' => 'invalid-sig'])
            ->assertStatus(400);
    }

    protected function assertJobIsVisible($id)
    {
        $this->assertTrue((bool) Job::find($id));
    }

    private function sampleEventHook($reference)
    {
        $data =  <<<JSON
    {"id": "evt_1HVhcFGzTVrXCnhaH6x96vsH",
    "object": "event",
    "api_version": "2020-08-27",
    "created": 1601142922,
    "data": {
        "object": {
            "id": "cs_test_wh0dFrUbm2s5KFUdvLolQeaM0GOBNAafTLDFlN2TkHTbIA34xDDJtIS5",
            "object": "checkout.session",
            "allow_promotion_codes": null,
            "amount_subtotal": 29900,
            "amount_total": 29900,
            "billing_address_collection": null,
            "cancel_url": "http:\/\/localhost:8000\/stripe\/cancel\/{CHECKOUT_SESSION_ID}",

    
            "client_reference_id": "$reference",


            "currency": "usd",
            "customer": "cus_I5tPMDn4UsFi1C",
            "customer_email": "php@local.testing",
            "livemode": false,
            "locale": null,
            "metadata": [],
            "mode": "subscription",
            "payment_intent": null,
            "payment_method_types": [
                "card"
            ],
            "payment_status": "paid",
            "setup_intent": null,
            "shipping": null,
            "shipping_address_collection": null,
            "submit_type": null,
            "subscription": "sub_I5tPkj3Bhvq1TU",
            "success_url": "http:\/\/localhost:8000\/stripe\/success\/{CHECKOUT_SESSION_ID}",
            "total_details": {
                "amount_discount": 0,
                "amount_tax": 0
            }
        }
    },
    "livemode": false,
    "pending_webhooks": 1,
    "request": {
        "id": "req_6wVjhltM3MyzVa",
        "idempotency_key": null
    },
    "type": "checkout.session.completed"
}  
JSON;
        return json_decode($data, true);
    }
}
