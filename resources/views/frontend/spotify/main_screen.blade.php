@extends('frontend.spotify.layout.app')
@section('content')
    <div class="right-bar">
        <section class="musicplayer-main-sec">
            <div class="mp-sec">
                <h2 class="mp-main-head">Popular Artist</h2>
                <div class="pop-artists">
                    @foreach ($artists as $artist)
                        <div class="artist">
                            {{-- @dd($artist->user->profile_image) --}}
                            <img src="{{ asset('storage/' . $artist->user->profile_image) }}" alt="{{ $artist->user->name }}">
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
                            {{-- @dd($album->cover_image) --}}
                            <img src="{{ asset('storage/' . $album->cover_image) }}" alt="">
                            <p class="mp-desc">{{ $album->description }}</p>
                            <div class="playbtndiv">
                                <a class="playbtn" href="javascript:void(0);" onclick="playalbum({{ $album->id }})">
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
                            <img src="{{ asset('storage/' . $track->cover_image_path) }}" alt="">
                            <p class="mp-desc">{{ $track->description }}</p>
                            <div class="playbtndiv">
                                <a class="playbtn" href="javascript:void(0);"
                                    onclick="playSingleTrack({{ $track->id }})">
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
@endsection
