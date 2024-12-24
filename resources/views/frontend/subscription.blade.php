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
                            <div class="row d-flex
                            "
                            >
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
                                           {{  $plan->description }}
                                        </p>
                                        <div class="price">
                                            <h3 class="pric1-d">${{  $plan->price }}

                                            </h3>
                                            <h3 class="pric1-e">USD /mo</h3>
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
                                        @if ($plan)
                                            <a href="{{ route('subscription.show', $plan->slug) }}" class="free-btn">Try For
                                                Free</a>
                                        @endif

                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="pricing-div-1">
                                        <h4 class="pric1-a">D’angelo’s</h4>
                                        <h4 class="pric1-b">FOR SMALL BUSINESSES</h4>
                                        <p class="pric1-c">
                                            Level up your business with professional reporting and
                                            more staff accounts
                                        </p>
                                        <div class="price">
                                            <h3 class="pric1-d">$60</h3>
                                            <h3 class="pric1-e">USD /mo</h3>
                                        </div>
                                        <div class="price-first">
                                            <h3 class="pric1-f">
                                                Get Your First 3 Months For $1/Mo
                                            </h3>
                                        </div>
                                        <h4 class="pric1-g">What's Included On D’angelo’s</h4>
                                        <ul class="price-ul">
                                            <li>Professional reports</li>
                                            <li>Up to 1,000 inventory locations</li>
                                            <li>5 staff accounts</li>
                                        </ul>
                                        @if ($plan)
                                            <a href="{{ route('subscription.show', $plan->slug) }}" class="free-btn">Try For
                                                Free</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pricing-div-1">
                                        <h4 class="pric1-a">Advanced</h4>
                                        <h4 class="pric1-b">FOR MEDIUM TO LARGE BUSINESSES</h4>
                                        <p class="pric1-c">
                                            Get the best of Shopify with custom reporting and our
                                            lowest transaction fees
                                        </p>
                                        <div class="price">
                                            <h3 class="pric1-d">$399</h3>
                                            <h3 class="pric1-e">USD /mo</h3>
                                        </div>
                                        <div class="price-first">
                                            <h3 class="pric1-f">
                                                Get Your First 3 Months For $1/Mo
                                            </h3>
                                        </div>
                                        <h4 class="pric1-g">What's Included On Advanced</h4>
                                        <ul class="price-ul">
                                            <li>Custom report builder</li>
                                            <li>Up to 1,000 inventory locations</li>
                                            <li>15 staff accounts</li>
                                        </ul>
                                        @if ($plan)
                                            <a href="{{ route('subscription.show', $plan->slug) }}" class="free-btn">Try For
                                                Free</a>
                                        @endif
                                    </div>
                                </div> --}}
                                @endforeach
                            </div>
                        </div>
                    </div>



                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                    <div class="pricing-div">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="pricing-div-1">
                                        <h4 class="pric1-a">Basic</h4>
                                        <h4 class="pric1-b">
                                            FOR INDIVIDUALS & SMALL BUSINESSES
                                        </h4>
                                        <p class="pric1-c">
                                            Everything you need to create your store, ship products,
                                            and process payments
                                        </p>
                                        <div class="price">
                                            <h3 class="pric1-d">$25</h3>
                                            <h3 class="pric1-e">USD /yr</h3>
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
                                        <a href="#" class="free-btn">Try For Free</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pricing-div-1">
                                        <h4 class="pric1-a">D’angelo’s</h4>
                                        <h4 class="pric1-b">FOR SMALL BUSINESSES</h4>
                                        <p class="pric1-c">
                                            Level up your business with professional reporting and
                                            more staff accounts
                                        </p>
                                        <div class="price">
                                            <h3 class="pric1-d">$60</h3>
                                            <h3 class="pric1-e">USD /yr</h3>
                                        </div>
                                        <div class="price-first">
                                            <h3 class="pric1-f">
                                                Get Your First 3 Months For $1/Mo
                                            </h3>
                                        </div>
                                        <h4 class="pric1-g">What's Included On D’angelo’s</h4>
                                        <ul class="price-ul">
                                            <li>Professional reports</li>
                                            <li>Up to 1,000 inventory locations</li>
                                            <li>5 staff accounts</li>
                                        </ul>
                                        <a href="#" class="free-btn">Try For Free</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pricing-div-1">
                                        <h4 class="pric1-a">Advanced</h4>
                                        <h4 class="pric1-b">FOR MEDIUM TO LARGE BUSINESSES</h4>
                                        <p class="pric1-c">
                                            Get the best of Shopify with custom reporting and our
                                            lowest transaction fees
                                        </p>
                                        <div class="price">
                                            <h3 class="pric1-d">$399</h3>
                                            <h3 class="pric1-e">USD /yr</h3>
                                        </div>
                                        <div class="price-first">
                                            <h3 class="pric1-f">
                                                Get Your First 3 Months For $1/Mo
                                            </h3>
                                        </div>
                                        <h4 class="pric1-g">What's Included On Advanced</h4>
                                        <ul class="price-ul">
                                            <li>Custom report builder</li>
                                            <li>Up to 1,000 inventory locations</li>
                                            <li>15 staff accounts</li>
                                        </ul>
                                        <a href="#" class="free-btn">Try For Free</a>
                                    </div>
                                </div>
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
@endsection
