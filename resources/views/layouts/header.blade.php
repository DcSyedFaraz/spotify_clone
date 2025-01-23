<header class="header">
    <nav class="navbar navbar-light navbar-expand-lg d-block p-0">
        <div class="header-a">
            <div class="container d-block">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="first-div">
                            <a href="{{ route('start-selling') }}" class="start">Start Selling</a>
                            <a href="{{ route('explore') }}" class="starta">Explore</a>
                            <a href="{{ route('creator-tools') }}" class="starta">Creator Tools</a>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <a href="{{ route('home') }}"><img src="{{ asset('front_asset/images/logo.png') }}"
                                class="head-logo" /></a>
                    </div>
                    <div class="col-md-5">
                        <div class="second-div">
                            <div id="myOverlay" class="overlay">
                                <span class="closebtn" onclick="closeSearch()" title="Close Overlay">x</span>
                                <div class="overlay-content">
                                    <form action="#">
                                        <input type="text" placeholder="Search.." name="search" />
                                        <button type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <button class="openBtn" onclick="openSearch()">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <a href="#" class="startb"><i class="fa-solid fa-cart-shopping"></i></a>
                            <a href="{{ route('register') }}" class="starta">Sign Up</a>|
                            <a href="{{ route('login') }}" class="starta">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid d-block ct-1">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="second-hd">
                        <a href="{{ route('feeds') }}">
                            <li>Feed</li>
                        </a>
                        <a href="{{ route('tracks') }}">
                            <li>Tracks</li>
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
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
