@extends('frontend.spotify.layout.app')

@section('content')
    <div>
        <h1>Your Playlists</h1>
        <form action="{{ route('playlists.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Playlist Name" required>
            <textarea name="description" placeholder="Description"></textarea>
            <button type="submit">Create Playlist</button>
        </form>

        @foreach ($playlists as $playlist)
            <div>
                <a href="{{ route('playlists.show', $playlist->id) }}">{{ $playlist->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
