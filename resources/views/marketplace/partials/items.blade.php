<div class="row">
    @foreach ($merchItems as $item)
        <div class="col-md-3">
            <div class="image-box">
                <a href="javascript:" class="imganchor">
                    <img src="{{ $item->images->first()
                        ? asset('storage/' . $item->images->first()->image_path)
                        : asset('images/default.png') }}"
                        alt="product" class="p1">
                </a>
                <div class="star">
                    <i class="fa {{ in_array($item->id, $wishlist) ? 'fa-star' : 'fa-star-o' }}"></i>
                </div>
                <a href="javascript:">
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

                        <form action="{{ route('marketplace.wishlist.add', $item) }}" method="POST"
                            class="{{ in_array($item->id, $wishlist) ? 'btn-wishlist-added' : '' }}">
                            @csrf
                            <button type="submit" class="cart1">
                                <i class="fa fa-heart"></i>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="w-full">
                        <a href="{{ route('login') }}" class="btn w-full btn-primary">
                            <i class="fa fa-heart hearta"></i> Login
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    @endforeach
</div>
