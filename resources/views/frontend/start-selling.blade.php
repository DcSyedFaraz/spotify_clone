{{-- @extends('layout.selling_menu') --}}
<!DOCTYPE html>
<html lang="en" class="pageid-spot">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <title>Spotify</title>
</head>

<body style="background: #000">
    <header class="spotify-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <a href="#" class="sidebar-inner-a"><img src="{{ asset('assets/images/logo.png') }}"
                            class="spotify-logo" /></a>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 col-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                            <button class="btn search-button" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2 d-none d-md-block text-end">
                    <a href="{{ route('register') }}" class="sign-btn">Sign up</a>
                    <a href="{{ route('login') }}" class="login-btn">Log in</a>
                </div>
            </div>
        </div>
    </header>

    <section class="selling-main">
        <div class="container-fluid p-0 d-flex">
            <div class="sidebar">
                <div class="sidebar-1">
                    <div class="sidebar-inner sidebar-inner-main my-0">
                        <a href="#" class="sidebar-inner-a"><img
                                src="./assets/images/music-player/library-icon.png" class="icon" />
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
                <section class="musicplayer-main-sec">
                    <div class="mp-sec">
                        <h2 class="mp-main-head">Popular Artist</h2>
                        <div class="pop-artists">
                            @foreach ($artists as $artist)
                                <div class="artist">
                                    <img src="{{ asset('assets/images/music-player/prof1.jpg') }}" alt="">
                                    <h5 class="name">{{ $artist->name }}</h5>
                                    <p class="mp-desc">Artist</p>
                                    <div class="playbtndiv">
                                        <a class="playbtn" href="#">
                                            <i class="fa-sharp fa-solid fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mp-sec">
                        <h2 class="mp-main-head">Popular Albums and Singles</h2>
                        <div class="pop-albums">
                            @foreach ($albums as $album)
                                <div class="albums">
                                    <img src="{{ asset('assets/images/music-player/' . $album->cover_image) }}"
                                        alt="">
                                    <p class="mp-desc">{{ $album->description }}</p>
                                    <div class="playbtndiv">
                                        <a class="playbtn" href="#">
                                            <i class="fa-sharp fa-solid fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mp-sec">
                        <h2 class="mp-main-head">Popular Radio</h2>
                        <div class="pop-albums">
                            @foreach ($tracks as $track)
                                <div class="albums">
                                    <img src="{{ asset('assets/images/music-player/' . $track->cover_image) }}"
                                        alt="">
                                    <p class="mp-desc">{{ $track->description }}</p>
                                    <div class="playbtndiv">
                                        <a class="playbtn"
                                            href="{{ asset('storage/audio/' . $track->audio_file_path) }}">
                                            <i class="fa-sharp fa-solid fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <footer class="feat-foot" id="footer">
                    <div class="container">
                        <!-- Footer content -->
                        <div class="footer-div">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="copyright-text">
                                        © 2024 Mr. Bertrel Bogan. All rights reserved.
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
