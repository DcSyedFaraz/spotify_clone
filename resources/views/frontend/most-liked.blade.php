@extends('layout.trending_menu')
@section('content')
<section class="liked">
    <div class="liked-1">
      <div class="container">
        <h3 class="liked1-a">TEE GRIZZLEY - FLOATERS [OFFICAL VIDEO]</h3>
        <div class="liked1-inner">
          <img src="./assets/images/liked/home-a.png" class="home-a" />
          <img src="./assets/images/liked/home-b.png" class="home-a" />
          <img src="./assets/images/liked/home-c.png" class="home-a" />
          <img src="./assets/images/liked/home-d.png" class="home-a" />
        </div>
      </div>
    </div>

    <div class="liked-2">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="liked2-inner">
              <img
                src="./assets/images/liked/liked-profile.png"
                class="liked-profile-img"
              />
              <div class="liked2-inner-1">
                <h3 class="liked2-a">Music</h3>
                <h3 class="liked2-b">120M Subscribers</h3>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-end">
            <a href="#" class="subscribe-btn">Subscribe</a>
            <a href="#" class="search-btn"
              ><i class="fa-solid fa-magnifying-glass"></i
            ></a>
          </div>
        </div>
      </div>
    </div>

    <div class="liked-3">
      <div class="container">
        <div class="liked3-inner-1">
          @forelse ($tracks as $track)
            <div class="liked-3inner">
              <img src="{{ asset('storage/' . $track->cover_image_path) }}" class="music1-img" />
              <div>
                <h3 class="liked3-a">{{ $track->title }}</h3>
                <h3 class="liked3-b">
                  {{ $track->artist->name }} &bull; {{ $track->likes_count }} Likes
                </h3>
                <a href="{{ route('track.play', $track->id) }}" class="liked3-inner">Play</a>
              </div>
            </div>
          @empty
            <p class="text-white">No liked tracks available.</p>
          @endforelse
        </div>
      </div>
    </div>
  </section>
@endsection
