@extends('layout.trending_menu')
@section('title', 'Marketplace - Cart')
@section('content')
    <section class="cart-mainsec">
        <section class="cart-sec1">
            <div class="container">
                <div class="prdct-carthead">
                    <div class="item">
                        <h5>ITEMS</h5>
                    </div>
                    <div class="price">
                        <h5>PRICE</h5>
                    </div>
                    <div class="quantity">
                        <h5>QUANTITY</h5>
                    </div>
                    <div class="totals">
                        <h5>TOTALS</h5>
                    </div>
                </div>
                @forelse($cartItems as $cartItem)
                    <div class="prdct-cart">
                        <div class="item">
                            <img src="{{ asset('storage/' . $cartItem->merchItem->images->first()->image_path) }}"
                                alt="{{ $cartItem->merchItem->name }}">
                            <h4>{{ $cartItem->merchItem->name }}</h4>
                        </div>
                        <div class="price">
                            <h4>${{ number_format($cartItem->merchItem->price, 2) }}</h4>
                        </div>
                        <div class="quantity">
                            <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" id="qty" min="1" max="10"
                                    step="1" value="{{ $cartItem->quantity }}">
                                <button type="submit">Update</button>
                            </form>
                        </div>
                        <div class="totals">
                            <h4>
                                ${{ number_format($cartItem->merchItem->price * $cartItem->quantity, 2) }}
                            </h4>
                        </div>
                    </div>
                @empty
                    <p>No items in cart.</p>
                @endforelse
            </div>
        </section>
        <section class="cart-sec2">
            <div class="container">
                <div class="cart-amount">
                    <div class="amount">
                        <h5>Subtotals:</h5>
                        <p>${{ number_format($subtotal, 2) }}</p>
                    </div>
                    <div class="amount">
                        <h5>Sales Tax:</h5>
                        <p>${{ number_format($salesTax, 2) }}</p>
                    </div>
                    {{-- <div class="amount">
                        <h5>Coupon Code:</h5>
                        <form action="#" method="POST">
                            @csrf
                            <input type="text" name="coupon_code" placeholder="Add Coupon">
                            <button type="submit">Apply</button>
                        </form>
                    </div> --}}
                    <div class="amount">
                        <h5>Grand Total:</h5>
                        <h4>${{ number_format($grandTotal, 2) }}</h4>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="checkout">Check Out</a>
                </div>
            </div>
        </section>
    </section>

@endsection
