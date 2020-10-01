<?php

namespace App\Payment;

class CheckoutFlow
{
    public function initiate($options)
    {
        return app('stripe')->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'customer_email' => 'php@local.testing',
            'client_reference_id' => $options['reference'],
            'line_items' => [[
                'price' => 'price_1HP9ShGzTVrXCnhafJHrDjKk',
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => url('/stripe/success/{CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('/stripe/cancel/{CHECKOUT_SESSION_ID}'),

        ]);
    }

    public function referenceForSessionId($id)
    {
        return app('stripe')->checkout->sessions->retrieve($id)->client_reference_id;
    }

    public function referenceForSession($session)
    {
        return $session->client_reference_id;
    }
}
