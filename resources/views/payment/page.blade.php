@extends('layout.trending_menu')
@section('title', 'Payment Page')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4">
                    <a href="{{ route('orders.show', $order->id) }}" class="text-decoration-none">
                        <i class="fa-solid fa-arrow-left me-1"></i> Back to Order
                    </a>
                </div>

                <div class="card border-0 shadow-lg rounded-lg overflow-hidden">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0 fw-bold">Complete Payment</h2>
                        <p class="mb-0 mt-2">Order #{{ $order->id }}</p>
                    </div>

                    <div class="card-body p-4">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-file-invoice-dollar text-primary fs-1 me-3"></i>
                                    <div>
                                        <h5 class="mb-1">Order Total</h5>
                                        <span class="fs-4 fw-bold">${{ number_format($order->total_price, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mt-3 mt-md-0">
                                    <i class="fa-solid fa-box text-primary fs-1 me-3"></i>
                                    <div>
                                        <h5 class="mb-1">Items</h5>
                                        <span class="fs-4 fw-bold">{{ $order->orderItems->count() }} items</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <form id="payment-form" action="{{ route('stripe.charge') }}" method="post">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">

                            <div class="mb-4">
                                <label for="card-element" class="form-label fw-bold mb-2">
                                    <i class="fa-solid fa-credit-card me-2"></i>Credit or Debit Card
                                </label>
                                <div id="card-element" class="form-control p-3 border rounded-3 bg-light"
                                    style="min-height: 45px;">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <div id="card-errors" role="alert" class="mt-2 text-danger small"></div>
                            </div>

                            <div class="d-flex align-items-center mb-4 bg-light p-3 rounded-3">
                                <i class="fa-solid fa-lock text-success me-3"></i>
                                <div class="small">
                                    <strong>Secure Payment:</strong> Your payment information is encrypted and secure. We
                                    never store your full credit card details.
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary py-3 fw-bold" id="submit-payment">
                                    <i class="fa-solid fa-check-circle me-2"></i>Complete Payment -
                                    ${{ number_format($order->total_price, 2) }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer bg-light py-3">
                        <div class="row text-center">
                            <div class="col-4">
                                <i class="fa-solid fa-shield-alt text-success"></i>
                                <small class="d-block mt-1">Secure</small>
                            </div>
                            <div class="col-4">
                                <i class="fa-solid fa-lock text-success"></i>
                                <small class="d-block mt-1">Encrypted</small>
                            </div>
                            <div class="col-4">
                                <i class="fa-solid fa-clock text-success"></i>
                                <small class="d-block mt-1">Fast</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="mt-4 text-center">
                    <img src="{{ asset('assets/images/payment-methods.png') }}" alt="Payment Methods" class="img-fluid"
                        style="max-height: 30px;">
                </div> --}}
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-lg">
                    <div class="card-header bg-light py-3">
                        <h4 class="mb-0 fw-bold">Order Summary</h4>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach ($order->orderItems as $item)
                                <li class="list-group-item px-3 py-3 d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="fw-bold d-block">{{ $item->name }}</span>
                                        <small class="text-muted">Qty: {{ $item->quantity }}</small>
                                    </div>
                                    <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="p-3 border-top">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>${{ number_format($order->total_price, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping</span>
                                <span>Free</span>
                            </div>
                            <div class="d-flex justify-content-between pt-2 border-top fw-bold">
                                <span>Total</span>
                                <span>${{ number_format($order->total_price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create a Stripe client
            const stripe = Stripe('{{ env('STRIPE_KEY') }}');
            const elements = stripe.elements();

            // Create an instance of the card Element
            const cardElement = elements.create('card', {
                style: {
                    base: {
                        fontSize: '16px',
                        fontFamily: '"Inter", "Helvetica Neue", Helvetica, sans-serif',
                        color: '#32325d',
                        '::placeholder': {
                            color: '#aab7c4',
                        },
                    },
                    invalid: {
                        color: '#dc3545',
                        iconColor: '#dc3545',
                    },
                },
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` div
            cardElement.mount('#card-element');

            // Handle real-time validation errors from the card Element
            cardElement.addEventListener('change', function(event) {
                const displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission
            const form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const submitButton = document.getElementById('submit-payment');
                submitButton.disabled = true;
                submitButton.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Processing...';

                stripe.createToken(cardElement).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        const errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        submitButton.disabled = false;
                        submitButton.innerHTML =
                            '<i class="fa-solid fa-check-circle me-2"></i>Complete Payment - ${{ number_format($order->total_price, 2) }}';
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                const form = document.getElementById('payment-form');
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    </script>
@endsection

@section('styles')
    <style>
        #card-element {
            transition: box-shadow 0.15s ease;
        }

        #card-element:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .spinner-border {
            width: 1rem;
            height: 1rem;
        }
    </style>
@endsection
