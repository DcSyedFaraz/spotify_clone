@extends('layout.blog')
@section('content')

<section class="blogs-three">
    <section class="b3sec1">
        <div class="container">
            <h1>MASTER THE ART OF MUSIC</h1>
            <p>lorem ipsum dolor sit amet consectetur adipiscing elit aenean luctus urna ut lorem</p>
        </div>
    </section>
    <section class="b3sec2">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-md-8">
                    <div class="hello">
                        <div class="imgdiv">
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="">
                        </div>
                        <div class="content">
                            <h2>{{ $user->name }}</h2>
                            <p>{{ $user->artist->bio }}</p>
                        </div>

                    </div>

                    <div class="latest-events">
                        <h2>Latest Events</h2>
                        <div class="le">
                            <img src="{{ asset('assets/images/blog-3/le1.png') }}" alt="">
                            <h4><span>22</span><br>SEPT</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not</p>
                        </div>
                        <div class="le">
                            <img src=" {{ asset('assets/images/blog-3/le2.png') }}" alt="">
                            <h4><span>07</span><br>OCT</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not</p>
                        </div>
                        <div class="le">
                            <img src=" {{ asset('assets/images/blog-3/le3.png') }}" alt="">
                            <h4><span>15</span><br>NOV</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not</p>
                        </div>
                        <div class="le">
                            <img src=" {{ asset('assets/images/blog-3/le4.png') }}" alt="">
                            <h4><span>30</span><br>DEC</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tracks">
                        <h4>Music Tracks</h4>
                        <ul>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                            <li class="track">
                                <a href="#"><i class="fa-solid fa-play"></i> Lorem Ipsum</a>
                            </li>
                        </ul>
                        <a href="#" class="view">View All</a>
                    </div>
                    <div class="flickr">
                        <h4>FLICKR</h4>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src=" {{ asset('assets/images/blog-3/le1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src=" {{ asset('assets/images/blog-3/le2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src=" {{ asset('assets/images/blog-3/le3.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src=" {{ asset('assets/images/blog-3/le4.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src="{{ asset('assets/images/blog-3/le2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src="{{ asset('assets/images/blog-3/le3.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src="{{ asset('assets/images/blog-3/le1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src="{{ asset('assets/images/blog-3/le2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src="{{ asset('assets/images/blog-3/le3.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src="{{ asset('assets/images/blog-3/le4.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src="{{ asset('assets/images/blog-3/le2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flickimg">
                                    <img src="{{ asset('assets/images/blog-3/le3.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="view">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection
