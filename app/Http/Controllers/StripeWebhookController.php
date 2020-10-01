<?php

namespace App\Http\Controllers;

use App\Payment\BaseWebhook;
use App\Payment\CheckoutSessionCompleted;
use Illuminate\Support\Facades\Log;
use Stripe\Event as StripeEvent;

class StripeWebhookController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\VerifyStripeWebhook::class);
    }

    public function __invoke()
    {
        $event = stripeEvent();

        Log::debug($event);

        webhookHandlerFactory($event->type)->handle($event);
    }
}

function webhookHandlerFactory($type)
{
    $handlers = collect([
        StripeEvent::CHECKOUT_SESSION_COMPLETED => CheckoutSessionCompleted::class,
    ]);

    return with(
        $handlers->get($type, BaseWebhook::class),
        fn ($handler) => app($handler)
    );
}

function stripeEvent(): StripeEvent
{
    return StripeEvent::constructFrom(
        request()->input()
    );
}