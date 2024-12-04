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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.7/mediaelementplayer.min.css" />
    <link href="./assets/css/style.css" rel="stylesheet" />
    <title>Feature Page</title>
</head>

<body>
    <header class="header-sound">
        <nav class="navbar navbar-light navbar-expand-lg d-block p-0">
            <div class="header-b header-c">
                <div class="container d-block">
                    <div class="row align-items-center">
                        <div class="col-md-1 text-center">
                            <a href="/"><img src="{{ asset('assets/images/new logo.png') }}"
                                    class="head-logo w-75" /></a>
                        </div>
                        <div class="col-md-4">
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
                        <div class="col-md-3 text-end">
                            <a href="{{ route('explore') }}" class="start1">Explore</a>
                            <a href="{{ route('creator-tools') }}" class="starta">Creator Tools</a>
                        </div>
                        <div class="col-md-4">
                            <div class="second-div">
                                <a href="{{ route('register') }}" class="starta">Sign Up</a> |
                                <a href="{{ route('login') }}" class="starta">Sign In</a>
                                <a href="{{ route('start-selling') }}" class="start">Start Selling</a>
                                <a href="#" class="start-shopping"><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid d-block ct-3 ct-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <ul class="fifth-hd">
                            <a href="{{ route('feeds') }}">
                                <li>Feed</li>
                            </a>
                            <a href="{{ route('tracks') }}">
                                <li>Tracks</li>
                            </a>
                            <a href="{{ route('trending') }}">
                                <li>Trending</li>
                            </a>
                            <a href="{{ route('feature') }}" class="active">
                                <li>Feature</li>
                            </a>
                            <a href="{{ route('most-liked') }}">
                                <li>Most Liked</li>
                            </a>
                            <a href="{{ route('subscription') }}">
                                <li>Subscription</li>
                            </a>
                        </ul>
                    </div>
                    <div class="col-md-4 text-end"></div>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')


    <footer class="feat-foot">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <img src="./assets/images/feature/footer-top.png" class="footer-top-img" />
                </div>
                <div class="col-md-6">
                    <img src="./assets/images/feature/footer-logo.png" class="footer-logo" />
                    <p class="footer-p">
                        Encouraging music lovers and creators globally. Become a part of
                        uniting us all with melodies.
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
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.7/mediaelement-and-player.min.js"></script>
<script>
    var audio = {
        init: function() {
            var $that = this;
            $(function() {
                $that.components.media();
            });
        },
        components: {
            media: function(target) {
                var media = $(
                    "audio.fc-media",
                    target !== undefined ? target : "body"
                );
                if (media.length) {
                    media.mediaelementplayer({
                        audioHeight: 40,
                        features: [
                            "playpause",
                            "current",
                            "duration",
                            "progress",
                            "volume",
                            "tracks",
                            "fullscreen",
                        ],
                        alwaysShowControls: true,
                        timeAndDurationSeparator: "<span></span>",
                        iPadUseNativeControls: true,
                        iPhoneUseNativeControls: true,
                        AndroidUseNativeControls: true,
                    });
                }
            },
        },
    };
    audio.init();
</script>

<script>
    (function() {
        "use strict";

        var carousel = document.getElementsByClassName("carousel")[0],
            slider = carousel.getElementsByClassName("carousel__slider")[0],
            items = carousel.getElementsByClassName("carousel__slider__item"),
            prevBtn = carousel.getElementsByClassName("carousel__prev")[0],
            nextBtn = carousel.getElementsByClassName("carousel__next")[0];

        var width,
            height,
            totalWidth,
            margin = 20,
            currIndex = 0,
            interval,
            intervalTime = 5000;

        function init() {
            resize();
            move(Math.floor(items.length / 2));
            bindEvents();

            timer();
        }

        function resize() {
            (width = Math.max(window.innerWidth * 0.25, 275)),
            (height = window.innerHeight * 0.5),
            (totalWidth = width * items.length);

            slider.style.width = totalWidth + "px";

            for (var i = 0; i < items.length; i++) {
                let item = items[i];
                item.style.width = width - margin * 2 + "px";
                item.style.height = height + "px";
            }
        }

        function move(index) {
            if (index < 1) index = items.length;
            if (index > items.length) index = 1;
            currIndex = index;

            for (var i = 0; i < items.length; i++) {
                let item = items[i],
                    box = item.getElementsByClassName("item__3d-frame")[0];
                if (i == index - 1) {
                    item.classList.add("carousel__slider__item--active");
                    box.style.transform = "perspective(1200px)";
                } else {
                    item.classList.remove("carousel__slider__item--active");
                    box.style.transform =
                        "perspective(1200px) rotateY(" +
                        (i < index - 1 ? 40 : -40) +
                        "deg)";
                }
            }

            slider.style.transform =
                "translate3d(" +
                (index * -width + width / 2 + window.innerWidth / 2) +
                "px, 0, 0)";
        }

        function timer() {
            clearInterval(interval);
            interval = setInterval(() => {
                move(++currIndex);
            }, intervalTime);
        }

        function bindEvents() {
            window.onresize = resize;
        }

        init();
    })();
</script>

<script>
    $(document).ready(function() {
        $(".music-player1").each(function(index) {
            var audio = $(this).find(".audio-element")[0];

            $(this)
                .find(".start-button")
                .click(function() {
                    audio.play();
                });

            $(this)
                .find(".stop-button")
                .click(function() {
                    audio.pause();
                    audio.currentTime = 0;
                });

            $(this)
                .find(".reset-button")
                .click(function() {
                    audio.currentTime = 0;
                });
        });
    });
</script>

</html>
