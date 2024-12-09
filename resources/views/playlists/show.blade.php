@extends('frontend.spotify.layout.app')

@section('content')
    <div>
        <h1>{{ $playlist->name }}</h1>
        <p>{{ $playlist->description }}</p>

        <h2>Tracks</h2>
        <ul>
            @foreach ($playlist->tracks as $track)
                <li>{{ $track->title }} by {{ $track->artist->user->name }}</li>
            @endforeach
        </ul>

        <form action="{{ route('playlists.addTrack', $playlist->id) }}" method="POST">
            @csrf
            <select name="track_id">
                @foreach (App\Models\Track::all() as $track)
                    <option value="{{ $track->id }}">{{ $track->title }}</option>
                @endforeach
            </select>
            <button type="submit">Add Track</button>
        </form>
    </div>
@endsection
