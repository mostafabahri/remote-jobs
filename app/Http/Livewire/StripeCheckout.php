<?php

namespace App\Http\Livewire;

use App\Payment\CheckoutFlow;
use Livewire\Component;

class StripeCheckout extends Component
{
    public string $clientRef;

    public function render()
    {
        return view('livewire.stripe-checkout');
    }
    public function mount($clientRef)
    {
        $this->clientRef = $clientRef;
    }

    public function createSession(CheckoutFlow $checkout)
    {
        $session = $checkout->initiate(
            ['client_reference_id' => $this->clientRef]
        );

        $this->emit('sessionCreated', $session['id']);
    }
}


