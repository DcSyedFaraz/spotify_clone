@extends('layout.subscription_menu')
@section('content')
    <section class="subs-main">
        <div class="subs-1">
            <div class="container">
                <h3 class="subs1-a">
                    START FOR FREE, THEN ENJOY $1/MONTH FOR 3 MONTHS
                </h3>
                <h3 class="subs1-b">
                    Try D’angelo’s Free For 3 Days, No Credit Card Required
                </h3>
                <form>
                    <input type="email" class="email-input" placeholder="Email Here..." required />
                    <input type="submit" class="sub-btn" value="Start free trial" />
                </form>
                <h4 class="subs1-c">
                    By Entering Your Email, You Agree To Receive Marketing Emails From
                    Shopify.
                </h4>
            </div>
        </div>

        <div class="subs-2">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">
                        PAY MONTHLY
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">
                        pay yearly (save 25%)
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="pricing-div">
                        <div class="container">
                            <div class="row d-flex">
                                @foreach ($plans as $plan)
                                    <div class="col-md-4">
                                        <div class="pricing-div-1">
                                            <h4 class="pric1-a">
                                                {{ $plan->name }}

                                            </h4>
                                            <h4 class="pric1-b">
                                                FOR INDIVIDUALS & SMALL BUSINESSES
                                            </h4>
                                            <p class="pric1-c">
                                                {{ $plan->description }}
                                            </p>
                                            <div class="price">
                                                <h3 class="pric1-d">${{ $plan->price }}

                                                </h3>
                                                <h3 class="pric1-e">
                                                    USD /
                                                    {{ $plan->duration == 'mon' ? 'Yr' : 'Mon' }}</h3>
                                                </h3>

                                            </div>
                                            <div class="price-first">
                                                <h3 class="pric1-f">
                                                    Get Your First 3 Months For $1/Mo
                                                </h3>
                                            </div>
                                            <h4 class="pric1-g">What's Included On Basic</h4>
                                            <ul class="price-ul">
                                                <li>Basic reports</li>
                                                <li>Up to 1,000 inventory locations</li>
                                                <li>2 staff accounts</li>
                                            </ul>
                                            @auth
                                                <div class="d-flex justify-content-center mt-3">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#subscriptionModal" class="free-btn">
                                                        Try
                                                        For Free
                                                    </button>
                                                </div>

                                            @endauth

                                            @guest
                                                <div class="d-flex justify-content-center mt-3">
                                                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                                </div>

                                            @endguest
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                    <div class="pricing-div">
                        <div class="container">
                            <div class="row">
                                @foreach ($plans as $plan)
                                    <div class="col-md-4">
                                        <div class="pricing-div-1">
                                            <h4 class="pric1-a">
                                                {{ $plan->name }}

                                            </h4>
                                            <h4 class="pric1-b">
                                                FOR INDIVIDUALS & SMALL BUSINESSES
                                            </h4>
                                            <p class="pric1-c">
                                                Everything you need to create your store, ship products,
                                                and process payments
                                            </p>
                                            <div class="price">
                                                <h3 class="pric1-d">${{ $plan->price }}
                                                </h3>
                                                <h3 class="pric1-e"> USD / {{ $plan->duration == 'yr' ? 'Yr' : 'Mon' }}</h3>

                                                </h3>
                                            </div>
                                            <div class="price-first">
                                                <h3 class="pric1-f">
                                                    Get Your First 3 Months For $1/Mo
                                                </h3>
                                            </div>
                                            <h4 class="pric1-g">What's Included On Basic</h4>
                                            <ul class="price-ul">
                                                <li>Basic reports</li>
                                                <li>Up to 1,000 inventory locations</li>
                                                <li>2 staff accounts</li>
                                            </ul>
                                            @auth
                                                <div class="d-flex justify-content-center mt-3">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#subscriptionModal" class="free-btn">
                                                        Try
                                                        For Free
                                                    </button>
                                                </div>

                                            @endauth

                                            @guest
                                                <div class="d-flex justify-content-center mt-3">
                                                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                                </div>

                                            @endguest
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <p class="pric1-h">Prices May Vary By Your Store Location.</p>
            <a href="#" class="compare-btn">+ Compare Plane Features</a>

            <div class="subs-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="./assets/images/subscription/icon1.png" class="online-img" />
                            <h3 class="pric1-i">Online Store</h3>
                            <p class="pric1-j">
                                easily build an online store with the world’s
                                highest-converting, one-click checkout.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="./assets/images/subscription/icon2.png" class="online-img" />
                            <h3 class="pric1-i">Sales Channels</h3>
                            <p class="pric1-j">
                                expand your reach by listing your shopify catalog across top
                                social media platforms and online marketplaces.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="./assets/images/subscription/icon3.png" class="online-img" />
                            <h3 class="pric1-i">Point Of Sale</h3>
                            <p class="pric1-j">
                                shopify’s pos comes with staff management, inventory tracking,
                                and more. learn about pos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"style="background-color: #eee7e7;">
                    <h6>
                        You will be charged ${{ number_format($plan->price, 2) }} for
                        {{ $plan->name }} Plan
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #c4c0c0;">
                    <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">
                        <section class="subs-main">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        @csrf
                                        <input type="hidden" name="plan" id="plan"
                                            value="{{ $plan->id }}">
                                        <div class="row my-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="card-holder-name" style="color:black;">Name</label>
                                                    <input type="text" name="name" id="card-holder-name"
                                                        class="form-control" placeholder="Name on the card">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="card-element" style="color:black;">Card
                                                        details</label>
                                                    <div id="card-element"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
                <div class="modal-footer"style="background-color: #eee7e7;">
                    <button type="submit" class="btn btn-primary"
                        style="background-color:black; color:white; border:none;" id="card-button"
                        data-secret="{{ $intent->client_secret }}">Purchase</button>
                </div>
            </div>
        </div>
    </div>
 

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            hidePostalCode: true
        });
        cardElement.mount('#card-element');
        const form = document.getElementById('payment-form');
        const cardBtn = document.getElementById('card-button');
        const cardHolderName = document.getElementById('card-holder-name');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            cardBtn.disabled = true;

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value,
                    },
                },
            });
            if (error) {
                cardBtn.disabled = false;
            } else {
                let token = document.createElement('input');
                token.setAttribute('type', 'hidden');
                token.setAttribute('name', 'token');
                token.setAttribute('value', setupIntent.payment_method);
                form.appendChild(token);
                form.submit();
            }
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
        }

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
@endsection
