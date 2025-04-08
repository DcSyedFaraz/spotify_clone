<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/new logo.png') }}" />

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <title>Creator Tools</title>
</head>

<body style="background: #000">
    <section class="selling-main">
        <div class="container-fluid p-0">
            <header class="header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container d-block">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-6">
                                <a href="/"><img src="{{ asset('assets/images/new logo.png') }}"
                                        class=" w-50" /></a>
                            </div>
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
                                <a href="{{ route('register') }}" class="sign-btn">Sign up</a>
                                <a href="{{ route('login') }}" class="login-btn">Log in</a>
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
                                    <input type="email" class="form-input" required placeholder="Email here..." />
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
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
"></script>
<script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js
"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elms = document.getElementsByClassName('splide');

        for (var i = 0; i < elms.length; i++) {
            new Splide(elms[i], {
                type: 'loop',
                drag: 'free',
                focus: 'center',
                perPage: 4,
                autoScroll: {
                    speed: 0.5,
                    pauseOnHover: false,
                    pauseOnFocus: false,
                },
            }).mount(window.splide.Extensions);
        }
    });
</script>
<script>
    var audio1 = document.getElementById("audio_5f51b38");

    function toggleAudio(action) {
        if (action === 'play') {
            audio1.play();
            document.getElementById("lbl-btn-play").classList.add("active");
        } else if (action === 'pause') {
            audio1.pause();
            document.getElementById("lbl-btn-pause").classList.add("active");
        }
    }
</script>

</html>
