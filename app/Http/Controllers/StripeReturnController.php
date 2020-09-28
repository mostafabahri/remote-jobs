<?php

namespace App\Http\Controllers;

use App\Job;
use App\Payment\StripePayment;
use Illuminate\Support\Facades\Log;

class StripeReturnController extends Controller
{
    public function success(StripePayment $stripe, $session_id)
    {
        Log::debug('success with ref: ' . $session_id);

        $reference = $stripe->findReferenceBySession($session_id);

        return view('success', [
            'job' => Job::findOrFail($reference)
        ]);
    }

    public function cancel($session_id)
    {
        Log::debug('cancel with ref: ' . $session_id);
        return redirect()->to(route('home'));
    }
}
