<div class="sidebar">
    <div class="sidebar-1">
        <div class="sidebar-inner sidebar-inner-main my-0">
            <div class="playlist-add-btn">
                <h4 class="sidebar-inner-a">
                    <img src="{{ asset('assets/images/music-player/library-icon.png') }}" class="icon" />
                    Your Library
                </h4>
                <div class="dropdown playlist-add">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('playlists.index') }}">Create a new playlist</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-inner1">
                @auth
                    @forelse (auth()->user()->playlists as $playlist)
                        <a href="{{ route('playlists.show', $playlist->id) }}" class="play-div">
                            <i class="fa-solid fa-music"></i>
                            <div class="play-list">
                                <p>{{ $playlist->name }}</p>
                                <h6>Playlist . {{ auth()->user()->name }}</h6>
                            </div>
                        </a>
                    @empty
                        <h4 class="sidebar-inner1-a">Create your first playlist</h4>
                        <p class="sidebar-inner1-b">It's easy, we'll help you</p>
                        <a href="{{ route('playlists.index') }}" class="sidebar-inner1-btn">Create playlist</a>
                    @endforelse
                @else
                    <h4 class="sidebar-inner1-a">Welcome to Music Library</h4>
                    <p class="sidebar-inner1-b">Log in to create and manage your playlists.</p>
                    <a href="{{ route('login') }}" class="sidebar-inner1-btn">Log in</a>
                @endauth

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
