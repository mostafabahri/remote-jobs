<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Stripe\WebhookSignature;

class VerifyStripeWebhook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
             WebhookSignature::verifyHeader(
                request()->getContent(),
                request()->header('stripe-signature'),
                config('services.stripe.webhook_secret')
            );
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            Log::info('invalid stripe signature', ['sig' => $e->getSigHeader()]);
            abort(400);
        }

        return $next($request);
    }
}
