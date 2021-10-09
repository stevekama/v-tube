<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if (isset($page_title)){{ $page_title . ' - ' }}@endif {{ config('app.site_name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <!-- header -->
    <nav class="flex-div">
        <div class="nav-left flex-div">
            <img src="{{ asset('storage/img/menu.png') }}" class="menu-icon" alt="Menu Icon" />
            <img src="{{ asset('storage/img/logo.png') }}" class="logo" alt="Logo">
        </div>

        <div class="nav-middle flex-div">
            <div class="search-box flex-div">
                <input type="text" placeholder="Search">
                <img src="{{ asset('storage/img/search.png') }}" alt="Search">
            </div>
            <!-- <img src="images/voice-search.png" alt="Voice Search" class="mic-icon"> -->
        </div>

        <div class="nav-right flex-div">
            <img src="{{ asset('storage/img/upload.png') }}" alt="">
            <img src="{{ asset('storage/img/more.png') }}" alt="">
            <img src="{{ asset('storage/img/notification.png') }}" alt="">
            <img src="{{ asset('storage/img/Jack.png') }}" class="user-icon" alt="User Profile">
        </div>
    </nav>
    @php
        $page_url = $video->url;
    @endphp

    <div class="container play-container">
        <div class="row">
            <div class="play-video">
                {{-- <video controls autoplay>
                    <source src="{{ url('watch/' . $video->id . '/' . $video->slug) }}" type="video/mp4">
                </video> --}}

                @if ($video->type == 1)
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="{{ url('watch/' . $video->id . '/' . $video->slug) }}" allowfullscreen
                            scrolling="no" frameBorder="0" height="100%"></iframe>
                    </div>
                @else
                    <div class="embed-responsive embed-responsive-16by9"> {!! $video->content !!} </div>
                @endif

                <div class="tags">
                    <a href="">#Coding</a>
                    <a href="">#Html</a>
                    <a href="">#CSS</a>
                    <a href="">#JavaScript</a>
                </div>
                <h3>Best YouTube Channel To Learn Web Development</h3>
                <div class="play-video-info">
                    <p>{{ number_format($video->views) }} Views &bull; 2 days ago</p>
                    <div>
                        <a href=""><img src="{{ asset('storage/img/like.png') }}"
                                alt="">@include('laravelLikeComment::like', ['like_item_id' => $video->id])</a>
                        <a href=""><img src="{{ asset('storage/img/dislike.png') }}" alt="">15</a>
                        <a href=""><img src="{{ asset('storage/img/share.png') }}" alt="">Share</a>
                        <a href=""><img src="{{ asset('storage/img/save.png') }}" alt="">Save</a>
                    </div>
                </div>
                <hr>
                <div class="publisher">
                    <img src="images/Jack.png" alt="">
                    <div>
                        <p>Easy Tutorials</p>
                        <span>250k Subscribers</span>
                    </div>
                    <button type="button">Subscribe</button>
                </div>
                <div class="vid-description">
                    <p>Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam harum culpa cumque sequi.</p>
                    <hr>
                    <h4>134 Comments</h4>

                    <div class="add-comment">
                        <img src="{{ asset('storage/img/Jack.png') }}" alt="">
                        <input type="text" placeholder="Write Comments..">
                    </div>
                    <div class="old-commmments">
                        <img src="{{ asset('storage/img/Jack.png') }}" alt="">
                        <div>
                            <h3>Stephen Kamau <span>2 days ago</span></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis fuga ad magni.</p>
                            <div class="comment-action">
                                <img src="{{ asset('storage/img/like.png') }}" alt="">
                                <span>244</span>
                                <img src="{{ asset('storage/img/dislike.png') }}" alt="">
                                <span>2</span>
                                <span>REPLY</span>
                                <a href="">All Replies</a>
                            </div>
                        </div>
                    </div>
                    <div class="old-commmments">
                        <img src="{{ asset('storage/img/Jack.png') }}" alt="">
                        <div>
                            <h3>Kelvin Kinuthia <span> 4 days ago</span></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam eligendi cupiditate
                                ut cum! Id magni hic unde odio eligendi ipsam perspiciatis accusantium neque beatae ipsa
                                aliquam excepturi voluptate, incidunt doloribus?</p>
                            <div class="comment-action">
                                <img src="{{ asset('storage/img/like.png') }}" alt="">
                                <span>244</span>
                                <img src="{{ asset('storage/img/dislike.png') }}" alt="">
                                <span>2</span>
                                <span>REPLY</span>
                                <a href="">All Replies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-sidebar">
                @forelse($svideos as $svideo)
                    <div class="side-video-list">
                        <a href="" class="small-thumbnail"><img src="{{ asset('storage/img/thumbnail1.png') }}"
                                alt=""></a>
                        <div class="vid-info">
                            <a href="">Cat Fighting Video</a>
                            <p>Cat Videos</p>
                            <p>15k Views</p>
                        </div>
                    </div>
                @empty
                    <div class="side-video-list">
                        <a href="" class="small-thumbnail"><img src="{{ asset('storage/img/thumbnail2.png') }}"
                                alt=""></a>
                        <div class="vid-info">
                            <a href="">Cat Fighting Video</a>
                            <p>Cat Videos</p>
                            <p>15k Views</p>
                        </div>
                    </div>

                @endforelse
            </div>
        </div>
    </div>
</body>

</html>
