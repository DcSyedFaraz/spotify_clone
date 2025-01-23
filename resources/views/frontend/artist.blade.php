@extends('layout.trending_menu')
@section('title', 'Artists')
@section('content')
    <section class="blogs-one">
        <section class="b1sec1">
            <div class="container">
                <h1>
                    ARTIST
                </h1>
                <p>lorem ipsum dolor sit amet consectetur adipiscing elit aenean luctus urna ut lorem</p>
            </div>
        </section>
        <section class="b1sec2">
            <div class="container">
                <div class="row align-items-center">
                    @foreach ($users as $user)
                        <div class="col-md-4 px-4">
                            <div class="blogss">
                                @if ($user->artist)
                                    <a href="{{ route('artist.show', $user->id) }}">
                                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Artist Image">
                                        <div class="author">
                                            <p class="redtxt">{{ $user->name }}</p>
                                        </div>
                                        <p>{{ Str::limit($user->artist->bio, 100) }}</p>
                                    </a>
                                @endif


                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
@endsection
