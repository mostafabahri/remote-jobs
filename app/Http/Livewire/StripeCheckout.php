<?php

namespace App\Http\Livewire;

use App\Payment\CheckoutFlow;
use Livewire\Component;

class StripeCheckout extends Component
{
    public string $reference;

    public function render()
    {
        return view('livewire.stripe-checkout');
    }
    public function mount($reference)
    {
        $this->reference = $reference;
    }

    public function createSession(CheckoutFlow $checkout)
    {
        $session = $checkout->initiate(['reference' => $this->reference]);

        $this->emit('sessionCreated', $session['id']);
    }
}
