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
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/new logo.png') }}" />
    <title>Start Selling</title>
</head>

<body style="background: #000">
    <section class="selling-main">
        <div class="container-fluid p-0 d-flex">
            <div class="sidebar">
                <div class="sidebar-1">
                    <div class="sidebar-inner">
                        <a href="/" class="sidebar-inner-a"><img src="{{ asset('assets/images/new logo.png') }}"
                                class="sidebar-logo  w-75" /></a>
                        <a href="#" class="active sidebar-inner-a"><img
                                src="{{ asset('assets/images/selling/home-icon.png') }}" class="icon" />
                            Home</a>
                        <a href="#" class="sidebar-inner-a"><img
                                src="{{ asset('assets/images/selling/search-icon.png') }}" class="icon" />
                            Search</a>
                    </div>

                    <div class="sidebar-inner sidebar-inner-main">
                        <a href="#" class="sidebar-inner-a"><img
                                src="{{ asset('assets/images/selling/library-icon.png') }}" class="icon" />
                            Your Library <i class="fa-solid fa-plus"></i></a>
                        <div class="sidebar-inner1">
                            <h4 class="sidebar-inner1-a">Create your first playlist</h4>
                            <p class="sidebar-inner1-b">it's easy, we'll help you</p>
                            <a href="#" class="sidebar-inner1-btn">Create playlist</a>
                        </div>

                        <div class="sidebar-inner1">
                            <h4 class="sidebar-inner1-a">
                                let's find some podcasts to follow
                            </h4>
                            <p class="sidebar-inner1-b">
                                we'll help you updated on new episodes
                            </p>
                            <a href="#" class="sidebar-inner1-btn">browse podcasts</a>
                        </div>

                        <div class="links-div">
                            <a href="#">Legal</a>
                            <a href="#">Privacy Center</a>
                            <a href="#">Privacy Policy</a>
                            <a href="#">Cookies</a>
                            <a href="#">About Ads</a>
                            <a href="#">Accessibility</a>
                            <a href="#">Cookies</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-bar">
                <header class="header">
                    <nav class="navbar navbar-light navbar-expand-lg">
                        <div class="container d-block">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-6"></div>
                                <div class="col-md-6 d-none d-md-block">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('feeds') }}">Feed</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('tracks') }}">Tracks</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('trending') }}">Trending</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('feature') }}">Feature</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('marketplace.index') }}">Marketplace</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 d-none d-md-block text-end">
                                    <a href="./sign-up.html" class="sign-btn">Sign up</a>
                                    <a href="./sign-in.html" class="login-btn">Log in</a>
                                </div>
                                <div class="col-6 d-md-none text-end">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="offcanvas offcanvas-end bg-secondary secondary-1" id="navbarOffcanvas"
                                        tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
                                        <div class="offcanvas-header">
                                            <a class="navbar-brand" href="/"><img
                                                    src="./assets/images/footer-logo.png" alt="logo"
                                                    class="logo" /></a>
                                            <button type="button" class="btn-close btn-close-white text-reset"
                                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="./feeds.html">Feed</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="./tracks.html">Tracks</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="./trending.html">Trending</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="./feature.html">Feature</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>

                @yield('content')

                <footer class="feat-foot" id="footer">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img src="./assets/images/feature/footer-logo.png" class="footer-logo" />
                                <p class="footer-p">
                                    Encouraging music lovers and creators globally. Become a
                                    part of uniting us all with melodies.
                                </p>

                                <div class="feature-footer">
                                    <h4 class="footer-txt">Stay in Touch</h4>
                                    <form class="newsletter-form">
                                        <input type="email" class="form-input" required
                                            placeholder="Email here..." />
                                        <button type="submit" class="form-btn">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
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

                                <div class="feature-footer-1">
                                    <div class="row align-items-start">
                                        <div class="col-md-4">
                                            <p class="footer-head">Quick Links</p>
                                            <ul class="footer-ul">
                                                <a href="./feeds.html">
                                                    <li>Feed</li>
                                                </a>
                                                <a href="./tracks.html">
                                                    <li>Tracks</li>
                                                </a>
                                                <a href="./trending.html">
                                                    <li>Trending</li>
                                                </a>
                                                <a href="./feature.html">
                                                    <li>Feature</li>
                                                </a>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="footer-head">Resources</p>
                                            <ul class="footer-ul">
                                                <a href="./most-liked.html">
                                                    <li>Most Liked</li>
                                                </a>
                                                <a href="./subscription.html">
                                                    <li>Subscription</li>
                                                </a>
                                                <a href="./start-selling.html">
                                                    <li>Start Selling</li>
                                                </a>
                                                <a href="./explore.html">
                                                    <li>Explore</li>
                                                </a>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="footer-head">Company</p>
                                            <ul class="footer-ul">
                                                <a href="./creator-tools.html">
                                                    <li>Creator Tools</li>
                                                </a>
                                                <a href="./sign-in.html">
                                                    <li>Sign In</li>
                                                </a>
                                                <a href="./sign-up.html">
                                                    <li>Sign Up</li>
                                                </a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
                                    <p class="copyright-text">
                                        Privacy policy | Terms of service
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>

</html>
