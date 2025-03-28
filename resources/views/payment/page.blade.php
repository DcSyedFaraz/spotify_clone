@extends('layout.app')
@section('title', 'Payment Page')

@section('content')
    <div class="container">
        <h2>Complete Payment</h2>
        <form id="payment-form" action="{{ route('stripe.charge') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="card-element">
                    Credit or Debit Card
                </label>
                <!-- Stripe Card Element -->
                <div id="card-element" class="form-control">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
                <!-- Display errors returned by Stripe -->
                <div id="card-errors" role="alert" class="mt-2 text-danger"></div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit Payment</button>
        </form>
    </div>
@endsection

@section('scripts')
    <!-- Load Stripe.js on your page -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Initialize Stripe with your publishable key
        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the Stripe token.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server.
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form.
            form.submit();
        }
    </script>
@endsection
