<?php

namespace App\Payment;

use App\Job;
use Illuminate\Support\Facades\Log;

class CheckoutSessionCompleted
{
    public function handle(\Stripe\Event $event)
    {
        $job = Job::findDraft($this->referenceFor($event));
        $job->publish();

        Log::debug($job);
    }

    private function referenceFor($event)
    {
        return app(CheckoutFlow::class)->referenceForSession($event->data->object);
    }
}
