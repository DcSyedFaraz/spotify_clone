@extends('layout.trending_menu')
@section('title', 'Marketplace - Checkout')
@section('content')
    <section class="checkout-mainsec">
        <section class="chkout-sec1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{ route('checkout.store') }}">
                            @csrf
                            <!-- Email Address -->
                            <div class="address">
                                <h3>.1 Email Address</h3>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <!-- Billing Address -->
                            <div class="address">
                                <h3>.2 Billing Address</h3>
                                <div class="form-group">
                                    <label for="billing_name">Full Name</label>
                                    <input type="text" id="billing_name" name="billing_name" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="billing_phone">Phone Number</label>
                                    <input type="tel" id="billing_phone" name="billing_phone" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="billing_address1">Street Address Line 1</label>
                                    <input type="text" id="billing_address1" name="billing_address1" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="billing_address2">Street Address Line 2 (optional)</label>
                                    <input type="text" id="billing_address2" name="billing_address2"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="billing_city">City</label>
                                    <input type="text" id="billing_city" name="billing_city" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="billing_state">State/Province</label>
                                    <input type="text" id="billing_state" name="billing_state" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="billing_zip">ZIP/Postal Code</label>
                                    <input type="text" id="billing_zip" name="billing_zip" class="form-control" required>
                                </div>

                            </div>

                            <!-- Checkbox for Same Shipping Address -->
                            <div class="form-group">
                                <input type="checkbox" id="same_as_billing" name="same_as_billing">
                                <label for="same_as_billing">Shipping address is the same as billing address</label>
                            </div>

                            <!-- Shipping Address -->
                            <div class="address" id="shipping_address_section">
                                <h3>.3 Shipping Address</h3>
                                <div class="form-group">
                                    <label for="shipping_name">Full Name</label>
                                    <input type="text" id="shipping_name" name="shipping_name" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="shipping_address1">Street Address Line 1</label>
                                    <input type="text" id="shipping_address1" name="shipping_address1"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="shipping_address2">Street Address Line 2 (optional)</label>
                                    <input type="text" id="shipping_address2" name="shipping_address2"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="shipping_city">City</label>
                                    <input type="text" id="shipping_city" name="shipping_city" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="shipping_state">State/Province</label>
                                    <input type="text" id="shipping_state" name="shipping_state" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="shipping_zip">ZIP/Postal Code</label>
                                    <input type="text" id="shipping_zip" name="shipping_zip" class="form-control"
                                        required>
                                </div>

                            </div>

                            <!-- Shipping Method -->
                            <div class="ship">
                                <h3>Shipping Method</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipping_method"
                                        id="free_shipping" value="free" required>
                                    <label class="form-check-label" for="free_shipping">
                                        Free Shipping (2-4 Business Days)
                                    </label>
                                </div>
                                <!-- Add more shipping options if needed -->
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn checkout">Continue to Payment</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        @foreach ($cartItems as $cartItem)
                            <div class="prdct">
                                <div class="prdctimg">
                                    <img src="{{ asset('storage/' . $cartItem->merchItem->images->first()->image_path) }}"
                                        alt="">
                                </div>
                                <div class="prdctdesc">
                                    <h5>{{ $cartItem->merchItem->name }}</h5>
                                    <p><span>Quantity:</span> {{ $cartItem->quantity }}</p>
                                </div>
                                <div class="prdctprice">
                                    <p>( ${{ number_format($cartItem->merchItem->price * $cartItem->quantity, 2) }} )</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('scripts')
    <script>
        document.getElementById('same_as_billing').addEventListener('change', function() {
            const isChecked = this.checked;
            const billingFields = ['billing_name', 'billing_address1', 'billing_address2', 'billing_city',
                'billing_state', 'billing_zip', 'billing_country'
            ];
            const shippingFields = ['shipping_name', 'shipping_address1', 'shipping_address2', 'shipping_city',
                'shipping_state', 'shipping_zip', 'shipping_country'
            ];

            shippingFields.forEach((field, index) => {
                const shippingField = document.getElementById(field);
                const billingField = document.getElementById(billingFields[index]);

                if (isChecked) {
                    shippingField.value = billingField.value;
                    shippingField.disabled = true;
                } else {
                    shippingField.value = '';
                    shippingField.disabled = false;
                }
            });

            // Optionally hide the shipping address section
            document.getElementById('shipping_address_section').style.display = isChecked ? 'none' : 'block';
        });
    </script>
@endsection
