@extends('layout.trending_menu')
@section('title', 'Marketplace')
@section('content')
    <style>
        /* Cart button - added state */
        .btn-cart-added {
            background-color: #4CAF50 !important;
            /* Green */
            color: white !important;
            border-radius: 0 0 0 15px;

            /* border: 1px solid #4CAF50 !important; */
        }

        /* Wishlist button - added state */
        .btn-wishlist-added {
            background-color: #FF6347 !important;
            /* Tomato */
            color: white !important;
            /* border: 1px solid #FF6347 !important; */
        }
    </style>
    <section class="market-main">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="side">
                            <div class="marketplace-col">
                                <form class="example" action="" method="GET">
                                    <div class="marketplace">
                                        <h2 class="pickle">Mr. Bertrel Bogan</h2>
                                        <input type="text" placeholder="Search..." name="search"
                                            value="{{ request()->search }}">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                    <div class="categories1">
                                        <h3 class="categories">Categories</h3>
                                        @foreach ($artists as $artist)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="artists[]"
                                                    value="{{ $artist->id }}" id="artist_{{ $artist->id }}"
                                                    {{ in_array($artist->id, request()->artists ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label text-capitalize"
                                                    for="artist_{{ $artist->id }}">
                                                    {{ $artist->user->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div id="product">
                            <div class="row">
                                @forelse($merchItems as $item)
                                    <div class="col-md-3">
                                        <div class="image-box">
                                            <a href="javascript:" class="imganchor">
                                                <img src="{{ $item->images->first() ? asset('storage/' . $item->images->first()->image_path) : asset('images/default.png') }}"
                                                    alt="product" class="p1">
                                            </a>
                                            <div class="star">
                                                @if (in_array($item->id, $wishlist))
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="fa fa-star-o"></i>
                                                @endif
                                            </div>
                                            <a href="javascript:">
                                                <h3 class="lorem">{{ $item->name }}</h3>
                                            </a>
                                            <div class="price">
                                                <h3 class="price1">${{ $item->price }}</h3>
                                            </div>
                                            @auth
                                                <div class="addtocart">
                                                    <!-- For Cart Button -->
                                                    <form action="{{ route('marketplace.cart.add', $item) }}" method="POST"
                                                        class="{{ in_array($item->id, $cartItems) ? 'btn-cart-added' : '' }}">
                                                        @csrf
                                                        <button type="submit" class="cart1 ">
                                                            <i class="fa fa-cart-shopping"></i>
                                                            {{ in_array($item->id, $cartItems) ? 'Added' : 'Add To Cart' }}
                                                        </button>
                                                    </form>

                                                    <!-- For Wishlist Button -->
                                                    <form action="{{ route('marketplace.wishlist.add', $item) }}"
                                                        class="{{ in_array($item->id, $wishlist) ? 'btn-wishlist-added' : '' }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="cart1 ">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            @else
                                                <div class="w-full">
                                                    <a href="{{ route('login') }}" class="btn w-full btn-primary">
                                                        <i class="fa fa-heart hearta"></i> Login
                                                    </a>
                                                    {{-- <a href="{{ route('login') }}" class="btn btn-primary">
                                                        <i class="fa fa-cart-shopping"></i> Login to Add to Cart
                                                    </a> --}}
                                                </div>
                                            @endauth
                                        </div>
                                    </div>
                                @empty
                                    <p>No products found.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
