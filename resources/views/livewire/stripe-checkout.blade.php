@push('head')
    <script src="https://js.stripe.com/v3/"></script>
@endpush
<div class="flex space-x-2 items-center">
          <button id="checkout-button" 
          class="bg-indigo-500 text-white px-4 py-2 rounded-sm shadow-sm
          inline-flex items-center focus:outline-none"
          wire:click="createSession"> 

           <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading>
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      Checkout now!</button>


</div>
@push('scripts')
    
    <script type="text/javascript">

      const stripe = Stripe('{{config('services.stripe.pub_key')}}');

      window.livewire.on('sessionCreated', id => {
          return stripe.redirectToCheckout({ sessionId: id });
      })
    </script>
@endpush