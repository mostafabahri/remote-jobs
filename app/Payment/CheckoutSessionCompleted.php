<?php

namespace App\Payment;

use App\Job;
use Illuminate\Support\Facades\Log;

class CheckoutSessionCompleted
{
    public function handle(\Stripe\Event $event)
    {
        $job = Job::findDraft($event->data->object->client_reference_id);
        $job->publish();

        Log::debug($job);
    }
}
