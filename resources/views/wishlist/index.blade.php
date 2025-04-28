@extends('layout.trending_menu')
@section('title', 'Marketplace - Wishlist')
@section('content')
    <section class="wish-mainsec">
        <section class="wish-sec1">
            <div class="container">
                <div class="prdct-carthead">
                    <div class="item">
                        <h5>PRODUCTS NAME</h5>
                    </div>
                    <div class="price">
                        <h5>UNIT PRICE</h5>
                    </div>
                    <div class="quantity">
                        <h5>STOCKS STATUS</h5>
                    </div>
                    <div class="totals">
                        <h5></h5>
                    </div>
                </div>
                @forelse ($wishlistItems as $wishlistItem)
                    {{-- @dd($wishlistItem) --}}
                    <div class="prdct-cart">
                        <div class="item">
                            <img src="{{ asset('storage/' . $wishlistItem->merchItem->images->first()->image_path) }}"
                                class="w-25" alt="{{ $wishlistItem->merchItem->name }}">
                            <h4>{{ $wishlistItem->merchItem->name }}</h4>
                        </div>
                        <div class="price">
                            <h4>
                                {{-- <span class="cut-price">$40.00</span>  --}}
                                ${{ $wishlistItem->merchItem->price }}</h4>
                        </div>
                        <div class="quantity">
                            <h4>In Stock</h4>
                        </div>
                        <div class="totals">
                            {{-- <a href="#" class="addtocart">Add To Cart</a> --}}
                            <form action="{{ route('marketplace.cart.add', $wishlistItem->merchItem) }}" method="POST"
                                class="{{ in_array($wishlistItem->merchItem->id, $cartItems) ? 'btn-cart-added' : '' }}">
                                @csrf
                                <button type="submit" class="addtocart text-black">
                                    {{ in_array($wishlistItem->merchItem->id, $cartItems) ? 'Added' : 'Add To Cart' }}
                                </button>
                            </form>
                        </div>
                    </div>

                @empty
                    <p>No products found.</p>
                @endforelse
                <div class="btn">
                    <a href="#" class="checkout">Check Out</a>
                </div>

            </div>
        </section>
    </section>

@endsection
