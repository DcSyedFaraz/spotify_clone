@extends('layout.feature_menu')
@section('content')

<section class="feature-main">
    <div class="feature-1">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h3 class="feature-a">Enhance Your Music Experience</h3>
            <p class="feature-b">
              lNo more research while looking for the perfect beat, dive into
              our carefully created selection of top music streaming and arts.
              Explore, Discover, and be Inspired. With our vast choice of
              genres and tailored playlists, immerse yourself in a world of
              musical possibilities and upgrade your listening experience now.
            </p>
            <div class="featurebtn-div">
              <a href="#" class="shuffle-btn"
                ><i class="fa-solid fa-shuffle"></i> Make My Playlist</a
              >
              <a href="#" class="shuffle-btn"
                ><i class="fa-solid fa-tower-broadcast"></i> Explore all
                Tracks</a
              >
              <a href="#" class="shuffle-btn">Subscribe &nbsp; 10.4M</a>
            </div>
          </div>
          <div class="col-md-5"></div>
        </div>
      </div>
    </div>
    <div class="feature-2">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img
              src="./assets/images/feature/feature-2.png"
              class="feature-2-img"
            />
          </div>
          <div class="col-md-6">
            <h3 class="feature-2a">Start Your Beatmaker Journey Today!</h3>
            <p class="feature-2b">
              Become a music beat maker and achieve your creative potential in
              our thriving community of artists and music enthusiasts. Whether
              you're a seasoned producer or just getting started, our platform
              provides the tools, resources, and support you need to bring
              your musical concepts to life.
            </p>
            <img
              src="./assets/images/feature/feature-2a.png"
              class="feature-2-imga"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="feature-3">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12">
            <h3 class="feature-3a">Latest Track</h3>
            <p class="feature-3b">
              Discover the most recent beats and melodies in our Latest
              Tracks.
            </p>
          </div>
          <div class="col-md-8 mt-5 px-4">
            <div class="feature-3-abc">
              @foreach ($latestTracks as $track)
                <div class="feature-3-inner">
                  <img src="{{ asset('storage/' . $track->cover_image_path) }}" class="feature-3img" />
                  <div class="feature-3-innera">
                    <h4 class="feature-3c">{{ $track->title }}</h4>
                    <h4 class="feature-3d">{{ $track->created_at->year }}</h4>
                  </div>
                </div>
                <div class="contain">
                  <div class="music-player">
                    <div class="titre">
                      <h3>{{ $track->artist->name }}</h3>
                      <h1>{{ $track->title }}</h1>
                    </div>
                    <div class="lecteur">
                      <audio style="width: 100%" class="fc-media" controls>
                        <source src="{{ asset('storage/' . $track->audio_file_path) }}" type="audio/mp3" />
                      </audio>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="col-md-4 mt-5">
            @foreach ($latestTracks as $track)
              <div class="feature-3-inner-123 mt-4">
                <img src="{{ asset('storage/' . $track->cover_image_path) }}" class="feature-3imga" />
                <div class="feature-3-innera">
                  <h4 class="feature-3e">{{ $track->title }}</h4>
                  <h4 class="feature-3f">{{ $track->created_at->year }}</h4>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="feature-4">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="feature-4a">Embrace the Power of Music!</h3>
            <p class="feature-4b">
              Music is more than simply sound; it expresses the human
              experience. It can motivate, inspire, and heal. Whether you're
              dancing to your favorite beat or seeking comfort in a meaningful
              tune, music has the power to touch our souls and bring us
              together. So tune in, turn up the volume, and let the music
              accompany you.
            </p>
            <div class="feature-4-inner">
              <div class="row">
                <div class="col-md-6">
                  <img
                    src="./assets/images/feature/feature-4a.png"
                    class="feature-4a-img"
                  />
                  <img
                    src="./assets/images/feature/feature-4b.png"
                    class="feature-4a-img"
                  />
                </div>
                <div class="col-md-6">
                  <img
                    src="./assets/images/feature/feature-4c.png"
                    class="feature-4a-img"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 px-3">
            <img
              src="./assets/images/feature/feature-4d.png"
              class="feature-4a-img"
            />
            <div class="feature-4-innera">
              <img
                src="./assets/images/feature/feature-4e.png"
                class="feature-4b-img"
              />
              <img
                src="./assets/images/feature/feature-4f.png"
                class="feature-4c-img"
              />
            </div>
          </div>
          <div class="col-md-3">
            <img
              src="./assets/images/feature/feature-4g.png"
              class="feature-4d-img"
            />
            <img
              src="./assets/images/feature/feature-4h.png"
              class="feature-4e-img"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="feature-5">
      <div class="container-fluid">
        <h3 class="feature-3a">Tune into Live Music!</h3>
        <p class="feature-5b">
          From moderate acoustic performances to incredible concerts, our
          selection of fascinating live videos allows you to enjoy the magic
          of live music from the comfort of your own home.
        </p>
        <div class="carousel">
          <div class="carousel__body">
            <div class="carousel__slider">
              @foreach ($latestTracks as $track)
                <div class="carousel__slider__item">
                  <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                      <img src="{{ asset('storage/' . $track->cover_image_path) }}" class="feature-5-img" />
                      <div class="music-player1">
                        <audio class="audio-element" src="{{ asset('storage/' . $track->audio_file_path) }}"></audio>
                        <button class="start-button">
                          <i class="fa-solid fa-pause"></i>
                        </button>
                        <button class="stop-button">
                          <i class="fa-solid fa-play"></i>
                        </button>
                        <button class="reset-button">
                          <i class="fa-solid fa-square"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="feature-6">
      <div class="container">
        <h3 class="feature-6a">Play List</h3>
        <p class="feature-6b">
          Check out our playlist or create a playlist of your favorite beats.
        </p>
        <h3 class="feature-6c">Songs</h3>
        <div class="playlist-div">
          @foreach ($playlist as $track)
            <div class="playlist-inner">
              <div class="row">
                <div class="col-md-6">
                  <div class="playlist-inner-a">
                    <img src="{{ asset('storage/' . $track->cover_image_path) }}" class="playlist-img" />
                    <h4 class="playlist-a">{{ $track->title }}</h4>
                  </div>
                </div>
                <div class="col-md-2">
                  <h4 class="playlist-b">{{ $track->artist->name }}</h4>
                </div>
                <div class="col-md-2">
                  <h4 class="playlist-b">{{ $track->plays_count }} Plays</h4>
                </div>
                <div class="col-md-2">
                  <h4 class="playlist-b">{{ optional($track->album)->title }}</h4>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <a href="#" class="showall-btn">Show all</a>
      </div>
    </div>
  </section>
@endsection
