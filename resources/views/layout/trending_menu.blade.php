<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>

    <!--! Toastr -->
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/new logo.png') }}" />

    <title>
        @yield('title', 'DISC')
    </title>
    @yield('styles')
    @include('partials.preloader-script')
</head>

<body>
    @include('partials.preloader')
    <header class="header-sound">
        <div class="row align-items-center">
            <div class="col-6 d-block d-md-none">
                <a href="{{ route('home') }}"><img src="{{ asset('front_asset/images/logo.png') }}"
                        class="head-logo" /></a>
            </div>
            <div class="col-md-12 col-lg-12 col-6 d-none d-md-block">
        <nav class="navbar navbar-light navbar-expand-lg d-block p-0">
            <div class="header-b">
                <div class="container d-block">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-2 text-center">
                            <a href="/"><img src="{{ asset('assets/images/new logo.png') }}"
                                    class="head-logo w-75" /></a>
                        </div>
                        <div class="col-lg-4 col-md-3 d-none d-lg-flex d-md-none">
                            <div class="form-div1">
                                <form action="">
                                    <div class="p-1 bg-dark rounded rounded-pill shadow-sm">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button id="button-addon2" type="submit" class="btn">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                            <input type="search" placeholder="What're you looking for?"
                                                aria-describedby="button-addon2" class="form-control border-0" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-5 text-end">
                            <a href="{{ route('explore') }}"
                                class="start1 {{ request()->routeIs('explore') ? 'active' : '' }}">Explore</a>
                            <a href="{{ route('creator-tools') }}" class="starta">Creator Tools</a>
                        </div>
                        <div class="col-md-5">
                            <div class="second-div">
                                @guest
                                    <a href="{{ route('register') }}" class="starta">Sign Up</a>
                                    <a href="{{ route('login') }}" class="starta">Sign In</a>
                                @endguest
                                @auth
                                    @php
                                        $cartItems = auth()->user()->cartItems->pluck('id')->toArray();
                                        $wishlist = auth()->user()->wishlist->pluck('id')->toArray();
                                    @endphp
                                    <a href="{{ route('orders.index') }}" class="starta">
                                        <i class="fa-solid fa-box"></i>
                                        Orders
                                    </a> |
                                    <a href="{{ route('wishlist.index') }}" class="starta">Wishlist</a>
                                    @if (count($wishlist) > 0)
                                        <span class="badge bg-primary">
                                            {{ count($wishlist) }}
                                        </span>
                                    @endif
                                    |

                                    <a href="{{ route('cart.index') }}" class="start-shopping"><i
                                            class="fa-solid fa-cart-shopping"></i>
                                        @if (count($cartItems) > 0)
                                            <span class="badge bg-primary">
                                                {{ count($cartItems) }}
                                            </span>
                                        @endif
                                    </a>
                                @endauth
                                <a href="{{ route('start-selling') }}" class="start">Start Selling</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-block ct-3">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-12">
                        <ul class="third-hd">
                            <a href="{{ route('feeds') }}" class="{{ request()->routeIs('feeds') ? 'active' : '' }}">
                                <li>Feed</li>
                            </a>
                            {{-- <a href="{{ route('tracks') }}"
                                class="{{ request()->routeIs('tracks') ? 'active' : '' }}">
                                <li>Tracks</li>
                            </a> --}}
                            <a href="{{ route('trending') }}"
                                class="{{ request()->routeIs('trending') ? 'active' : '' }}">
                                <li>Trending</li>
                            </a>
                            <a href="{{ route('feature') }}"
                                class="{{ request()->routeIs('feature') ? 'active' : '' }}">
                                <li>Feature</li>
                            </a>
                            <a href="{{ route('most-liked') }}"
                                class="{{ request()->routeIs('most-liked') ? 'active' : '' }}">
                                <li>Most Liked</li>
                            </a>
                            <a href="{{ route('subscription.index') }}"
                                class="{{ request()->routeIs('subscription.index') ? 'active' : '' }}">
                                <li>Subscription</li>
                            </a>
                            <a href="{{ route('marketplace.index') }}"
                                class="{{ request()->routeIs('marketplace.index') ? 'active' : '' }}">
                                <li>Marketplace</li>
                            </a>
                        </ul>
                    </div>
                    <div class="col-md-4 text-end"></div>
                </div>
            </div>
        </nav>
        </div>
            <div class="col-6 d-lg-none d-md-none d-block">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="offcanvas offcanvas-end bg-secondary secondary-1" id="navbarOffcanvas" tabindex="-1"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <a href="{{ route('home') }}"><img src="{{ asset('front_asset/images/logo.png') }}"
                                class="head-logo" /></a>
                        <button type="button" class="btn-close btn-close-white text-reset"
                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <div class="nav-up">
                                <a href="{{ route('feeds') }}">
                                    <li>Feed</li>
                                </a>
                                <a href="{{ route('trending') }}">
                                    <li>Trending</li>
                                </a>
                                <a href="{{ route('feature') }}">
                                    <li>Feature</li>
                                </a>
                                <a href="{{ route('most-liked') }}">
                                    <li>Most Liked</li>
                                </a>
                                <a href="{{ route('subscription.index') }}">
                                    <li>Subscription</li>
                                </a>
                                <a href="{{ route('artists.list') }}">
                                    <li>Artists</li>
                                </a>
                                <a href="{{ route('marketplace.index') }}"
                                    class="{{ request()->routeIs('marketplace.index') ? 'active' : '' }}">
                                    <li>Marketplace</li>
                                </a>
                                <a href="{{ route('start-selling') }}" class="starta">Start Selling</a>
                                <a href="{{ route('explore') }}" class="starta">Explore</a>
                                <a href="{{ route('creator-tools') }}" class="starta">Creator Tools</a>
                                @guest
                                    <a href="{{ route('register') }}" class="starta">Sign Up</a>
                                    <a href="{{ route('login') }}" class="starta">Sign In</a>
                                @endguest
                                @auth
                                    @php
                                        $cartItems = auth()->user()->cartItems->pluck('id')->toArray();
                                        $wishlist = auth()->user()->wishlist->pluck('id')->toArray();
                                    @endphp
                                    <a href="{{ route('orders.index') }}" class="starta">
                                        Orders
                                    </a>
                                    <a href="{{ route('wishlist.index') }}" class="starta">Wishlist
                                        @if (count($wishlist) > 0)
                                            <span class="badge bg-primary">
                                                {{ count($wishlist) }}
                                            </span>
                                        @endif
                                    </a>
                                    <a href="{{ route('cart.index') }}" class="start-shopping shop1">Cart
                                        @if (count($cartItems) > 0)
                                            <span class="badge bg-primary">
                                                {{ count($cartItems) }}
                                            </span>
                                        @endif
                                    </a>
                                @endauth
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/feature/footer-logo.png') }}" />
                    <p class="footer-p">
                        Encouraging music lovers and creators globally. Become a part of
                        uniting us all with melodies.
                    </p>
                </div>
                <div class="col-md-6">
                    <h4 class="footer-txt">Join the community</h4>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-telegram"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="footer-txt">Stay in Touch</h4>
                    <form class="newsletter-form">
                        <input type="email" class="form-input" required placeholder="Email here..." />
                        <button type="submit" class="form-btn">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-2">
                    <p class="footer-head">My account</p>
                    <ul class="footer-ul">
                        <a href="{{ route('feeds') }}">
                            <li>Feed</li>
                        </a>
                        {{-- <a href="{{ route('tracks') }}">
                            <li>Tracks</li>
                        </a> --}}
                        <a href="{{ route('trending') }}">
                            <li>Trending</li>
                        </a>
                        <a href="{{ route('feature') }}">
                            <li>Feature</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-2">
                    <p class="footer-head">Resources</p>
                    <ul class="footer-ul">
                        <a href="{{ route('most-liked') }}">
                            <li>Most Liked</li>
                        </a>
                        <a href="{{ route('subscription.index') }}">
                            <li>Subscription</li>
                        </a>
                        <a href="{{ route('start-selling') }}">
                            <li>Start Selling</li>
                        </a>
                        <a href="{{ route('explore') }}">
                            <li>Explore</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-2">
                    <p class="footer-head">Company</p>
                    <ul class="footer-ul">
                        <a href="{{ route('creator-tools') }}">
                            <li>Creator Tools</li>
                        </a>
                        <a href="{{ route('login') }}">
                            <li>Sign In</li>
                        </a>
                        <a href="{{ route('register') }}">
                            <li>Sign Up</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid row-2">
            <div class="footer-div">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright-text">
                            © 2023 Mr. Bertrel Bogan. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p class="copyright-text">Privacy policy | Terms of service</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<script>
    $(function() {
        // $('#summernote').summernote();
        // $('#summernote1').summernote();

        $("#example1").DataTable({
            "responsive": false,
            "lengthChange": false,
            "autoWidth": true,
            "rowReorder": true,
            "buttons": ["csv", "excel", "pdf", "print"]
        });

    });
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if (session('error'))
        toastr.error("{{ session('error') }}")
    @endif
    @if (session('info'))
        toastr.info("{{ session('info') }}")
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>

@yield('scripts')

</html>
