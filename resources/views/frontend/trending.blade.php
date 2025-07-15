@extends('layout.trending_menu')
@section('content')
<section class="sound1">
    <div class="sound-a">
      <div class="container">
        <h3 class="sounda-1">Chart Trending</h3>
        <div class="sound-inner">
          <div class="sound-inner1">
            <img src="./assets/images/sound/sound-a.png" class="sound-img" />
            <h3 class="sound-inner1-a"><a href="#"> New & Notable </a></h3>
          </div>
          <div class="sound-inner1">
            <img src="./assets/images/sound/sound-b.png" class="sound-img" />
            <h3 class="sound-inner1-a"><a href="#"> Top Charts </a></h3>
          </div>
          <div class="sound-inner1">
            <img src="./assets/images/sound/sound-c.png" class="sound-img" />
            <h3 class="sound-inner1-a"><a href="#"> Exclusive Only </a></h3>
          </div>
          <div class="sound-inner1">
            <img src="./assets/images/sound/sound-d.png" class="sound-img" />
            <h3 class="sound-inner1-a"><a href="#"> Free Beats </a></h3>
          </div>
          <div class="sound-inner1">
            <img src="./assets/images/sound/sound-e.png" class="sound-img" />
            <h3 class="sound-inner1-a"><a href="#"> Beats W/ Hook </a></h3>
          </div>
          <div class="sound-inner1">
            <img src="./assets/images/sound/sound-f.png" class="sound-img" />
            <h3 class="sound-inner1-a"><a href="#"> Beats w/ Hook </a></h3>
          </div>
          <div class="sound-inner1">
            <img src="./assets/images/sound/sound-g.png" class="sound-img" />
            <h3 class="sound-inner1-a"><a href="#"> Top Lines</a></h3>
          </div>
        </div>
      </div>
    </div>
    <div class="sound-b">
      <div class="container">
        <div class="sound-inner-abc">
          <div>
            <form action="">
              <div class="p-1 bg-dark rounded rounded-pill shadow-sm">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button id="button-addon2" type="submit" class="btn">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                  <input type="search" placeholder="search for tags" aria-describedby="button-addon2"
                    class="form-control border-0" />
                </div>
              </div>
            </form>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">808</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">traps</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">rap</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">hiphop</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">type beast</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">gunna</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">beat</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">guitar</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">drill</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">future</a>
          </div>
        </div>
        <div class="sound-inner-abc mt-3">
          <div class="soundb-inner">
            <a href="#" class="soundb-a">hard</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">travis scott</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">hard</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">travis scott</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">hard</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">travis scott</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">hard</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">travis scott</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">hard</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">travis scott</a>
          </div>
          <div class="soundb-inner">
            <a href="#" class="soundb-a">hard</a>
          </div>
        </div>
      </div>
    </div>
    <div class="sound-c">
      <div class="container">
        <h3 class="sounda-1 mb-4">Trending Tracks</h3>
        <div class="row">
          @forelse ($trendingTracks as $track)
            <div class="col-md-3 col-sm-4 col-6 mb-4">
              <div class="card bg-dark text-white border-0 h-100">
                <img src="{{ asset('storage/' . $track->cover_image_path) }}" class="card-img-top bg3-img" alt="{{ $track->title }}">
                <div class="card-body p-2">
                  <h5 class="card-title soundc-1 mb-0">{{ $track->title }}</h5>
                  <p class="small mb-1">{{ $track->artist->name }}</p>
                  <p class="soundc-3 mb-1">Plays: {{ $track->recent_plays_count }}</p>
                </div>
              </div>
            </div>
          @empty
            <p class="text-white">No trending tracks found.</p>
          @endforelse
        </div>
      </div>
    </div>
  </section>
@endsection
