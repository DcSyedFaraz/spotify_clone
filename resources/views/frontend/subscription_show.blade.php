@extends('layout.subscription_menu')
@section('content')
    <section class="subs-main mt-5 mb-5
">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card
             "
                        style=" background-color:
             #c4c0c0; ">
                        <div class="card-header" style=" background-color:
             #eee7e7; ">
                            You will be charged ${{ number_format($plan->price, 2) }} for {{ $plan->name }} Plan
                        </div>

                        <div class="card-body">
                            <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
                                <div class="row">

                                    <div class="col-xl-4 col-lg-4">

                                        <div class="form-group">

                                            <label for="
                                            "
                                                style="color:black;
                                            ">Name</label>

                                            <input style="color:black;
                                            "
                                                type="text" name="name" id="card-holder-name" class="form-control"
                                                value="" placeholder="Name on the card">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-xl-4 col-lg-4">

                                        <div class="form-group">

                                            <label for=""
                                                style=" color:black;
                                            ">Card
                                                details</label>

                                            <div id="card-element"></div>

                                        </div>

                                    </div>

                                    <div class="col-xl-12 col-lg-12">

                                        <hr>

                                        <button type="submit" class="btn btn-primary"
                                            style=" background-color:black;  color:white; border:none;
                                "
                                            id="card-button" data-secret="{{ $intent->client_secret }}">Purchase</button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')

        const elements = stripe.elements()

        const cardElement = elements.create('card')

        cardElement.mount('#card-element')

        const form = document.getElementById('payment-form')

        const cardBtn = document.getElementById('card-button')

        const cardHolderName = document.getElementById('card-holder-name')

        form.addEventListener('submit', async (e) => {

            e.preventDefault()

            cardBtn.disabled = true

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(

                cardBtn.dataset.secret, {

                    payment_method: {

                        card: cardElement,

                        billing_details: {

                            name: cardHolderName.value

                        }

                    }

                }

            )

            if (error) {

                cardBtn.disable = false

            } else {

                let token = document.createElement('input')

                token.setAttribute('type', 'hidden')

                token.setAttribute('name', 'token')

                token.setAttribute('value', setupIntent.payment_method)

                form.appendChild(token)

                form.submit();

            }

        })
    </script>
@endsection
