@extends('layout.trending_menu')

@section('title', 'Marketplace')

@section('content')
    <style>
        .btn-cart-added {
            background-color: #4CAF50 !important;
            color: #fff !important;
            border-radius: 0 0 0 15px;
        }

        .btn-wishlist-added {
            background-color: #FF6347 !important;
            color: #fff !important;
        }

        #loader {
            text-align: center;
            padding: 1rem;
            display: none;
        }

        .trending-section h3 {
            margin-bottom: 1rem;
            font-weight: bold;
        }
    </style>
    @php
        use Illuminate\Support\Str;
    @endphp
    <section class="market-main">
        <div class="container-fluid">
            <div class="row">
                {{-- Sidebar (search + filters) --}}
                <div class="col-md-3">
                    <div class="side marketplace-col">
                        <form action="" method="GET" class="example">
                            <h2 class="pickle">Mr. Bertrel Bogan</h2>
                            <div class="marketplace">
                                <input type="text" name="search" placeholder="Search..."
                                    value="{{ request()->search }}">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                            <h3 class="categories mt-4">Categories</h3>
                            @foreach ($artists as $artist)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="artists[]"
                                        value="{{ $artist->id }}" id="artist_{{ $artist->id }}"
                                        {{ in_array($artist->id, request()->artists ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label text-capitalize" for="artist_{{ $artist->id }}">
                                        {{ $artist->user->name }}
                                    </label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>

                {{-- Item grid --}}
                <div class="col-md-9">
                    @if ($trendingItems->isNotEmpty())
                        <section class="trending-section mb-5">
                            <h3 class="text-white">Trending Items</h3>
                            <div class="row">
                                @foreach ($trendingItems as $item)
                                    <div class="col-md-3 my-2">
                                        <div class="image-box">
                                            <a href="{{ route('marketplace.show', $item->id) }}" class="imganchor">
                                                <img src="{{ $item->images->first()
                                                    ? asset('storage/' . $item->images->first()->image_path)
                                                    : asset('images/default.png') }}"
                                                    alt="product" class="p1">
                                            </a>
                                            <div class="star">
                                                <i
                                                    class="fa {{ in_array($item->id, $wishlist) ? 'fa-star' : 'fa-star-o' }}"></i>
                                            </div>
                                            <a href="{{ route('marketplace.show', $item->id) }}">
                                                <h3 class="lorem">{{ $item->name }}</h3>
                                            </a>
                                            <div class="price">
                                                <h3 class="price1">${{ $item->price }}</h3>
                                            </div>
                                            @auth
                                                <div class="addtocart">
                                                    <form action="{{ route('marketplace.cart.add', $item) }}" method="POST"
                                                        class="{{ in_array($item->id, $cartItems) ? 'btn-cart-added' : '' }}">
                                                        @csrf
                                                        <button type="submit" class="cart1">
                                                            <i class="fa fa-cart-shopping"></i>
                                                            {{ in_array($item->id, $cartItems) ? 'Added' : 'Add To Cart' }}
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('marketplace.wishlist.add', $item) }}"
                                                        method="POST"
                                                        class="{{ in_array($item->id, $wishlist) ? 'btn-wishlist-added' : '' }}">
                                                        @csrf
                                                        <button type="submit" class="cart1">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <a href="{{ route('login') }}" class="btn w-full btn-primary">
                                                    <i class="fa fa-heart hearta"></i> Login
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                @endforeach
                                @foreach ($printifyProducts as $product)
                                    <div class="col-md-3 my-2">
                                        <div class="image-box">
                                            <!-- Assuming Printify product has a similar structure with images -->
                                            <a href="{{ route('marketplace.show', $product['id']) }}" class="imganchor">
                                                <img src="{{ $product['images'][0]['src'] ?? asset('images/default.png') }}"
                                                    alt="product" class="p1">
                                            </a>
                                            <div class="star">
                                                <!-- Add logic if you have wishlist functionality for Printify products -->
                                                <i
                                                    class="fa {{ in_array($product['id'], $wishlist) ? 'fa-star' : 'fa-star-o' }}"></i>
                                            </div>
                                            <a href="{{ route('marketplace.show', $product['id']) }}">
                                                <h3 class="lorem">{{ Str::limit($product['title'], 30, '...') }}</h3>
                                            </a>
                                            <div class="price">
                                                <!-- Assuming Printify product price is accessible in a 'price' field -->
                                                <h3 class="price1">${{ $product['variants'][0]['price'] ?? 'N/A' }}</h3>
                                            </div>
                                            {{-- @auth
                                                <div class="addtocart">
                                                    <form
                                                        action="{{ route('marketplace.cart.add', $product['id']) }}"
                                                        method="POST"
                                                        class="{{ in_array($product['id'], $cartItems) ? 'btn-cart-added' : '' }}">
                                                        @csrf
                                                        <button type="submit" class="cart1">
                                                            <i class="fa fa-cart-shopping"></i>
                                                            {{ in_array($product['id'], $cartItems) ? 'Added' : 'Add To Cart' }}
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('marketplace.wishlist.add', ['id' => $product['id']]) }}"
                                                        method="POST"
                                                        class="{{ in_array($product['id'], $wishlist) ? 'btn-wishlist-added' : '' }}">
                                                        @csrf
                                                        <button type="submit" class="cart1">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <a href="{{ route('login') }}" class="btn w-full btn-primary">
                                                    <i class="fa fa-heart hearta"></i> Login
                                                </a>
                                            @endauth --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                        <hr>
                    @endif
                    <div id="item-container">
                        @include('marketplace.partials.items')
                    </div>

                    {{-- Loader and “sentinel” --}}
                    <div id="loader" class=" text-white">
                        <i class="fa fa-spinner fa-spin text-white"></i> Loading more…
                    </div>
                    <div id="load-more-trigger"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Infinite-scroll script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let nextPageUrl = '{{ $merchItems->nextPageUrl() }}';
            const loader = document.getElementById('loader');
            const trigger = document.getElementById('load-more-trigger');

            const onIntersect = (entries, observer) => {
                if (!nextPageUrl) {
                    observer.unobserve(trigger);
                    return;
                }
                if (entries[0].isIntersecting) {
                    observer.unobserve(trigger);
                    loader.style.display = 'block';

                    fetch(nextPageUrl, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(r => r.json())
                        .then(data => {
                            // append the new items
                            document.querySelector('#item-container .row')
                                .insertAdjacentHTML('beforeend', data.items);

                            nextPageUrl = data.next_page_url;
                            loader.style.display = 'none';

                            if (nextPageUrl) {
                                observer.observe(trigger);
                            }
                        })
                        .catch(console.error);
                }
            };

            const observer = new IntersectionObserver(onIntersect, {
                rootMargin: '200px'
            });
            observer.observe(trigger);
        });
    </script>
@endsection
