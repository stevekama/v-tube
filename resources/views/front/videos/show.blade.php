<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if (isset($page_title)){{ $page_title . ' - ' }}@endif {{ config('app.site_name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

    <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#showComment").trigger("click");
        });

        $(".watch_later").on('click', function(event) {
            event.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                url: '{{ action('VideoController@addWatchLater') }}',
                type: 'POST',
                data: {
                    id: id
                },
            });
            .done(function(data) {
                toastr.success(data);
            });
        });

        function copyToClip(str, response_field = '') {
            function listener(e) {
                e.clipboardData.setData("text/html", str);
                e.clipboardData.setData("text/plain", str);
                e.preventDefault();
            }

            document.addEventListener("copy", listener);
            document.execCommand("copy");
            document.removeEventListener("copy", listener);
            if (response_field.length > 0) $('#' + response_field).html('Copied');
        }
    </script>
</head>

<body>

    <!-- header -->
    <nav class="flex-div">
        <div class="nav-left flex-div">
            <img src="{{ asset('storage/img/menu.png') }}" class="menu-icon" alt="Menu Icon" />
            <a href="{{ route("home") }}">
                <img src="{{ asset('storage/img/logo.png') }}" class="logo" alt="Logo">
            </a>
        </div>

        <div class="nav-middle flex-div">
            <div class="search-box flex-div">
                <input type="text" placeholder="Search">
                <img src="{{ asset('storage/img/search.png') }}" alt="Search">
            </div>
            <!-- <img src="images/voice-search.png" alt="Voice Search" class="mic-icon"> -->
        </div>

        <div class="nav-right flex-div">
            <a href="#"><img src="{{ asset('storage/img/upload.png') }}" alt=""></a>
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
                    <a href="#">{!! html_entity_decode( $video->tags ) !!}</a>
                </div>
                <h3>
                    {{ $video->title }}
                </h3>
                {{-- <h3>Best YouTube Channel To Learn Web Development</h3> --}}
                <div class="play-video-info">
                    <p>{{ number_format($video->views) }} Views &bull; 2 days ago</p>
                    <div>
                        @include('laravelLikeComment::like', ['like_item_id' => $video->id])
                        <a href="#" class="pull-left" style="cursor: pointer;" data-toggle="modal"
                            data-target="#shareModal">
                            <i class="fa fa-share"></i>&nbsp; Share&nbsp;
                        </a>
                        @if ($video->type == 1 && config('app.video_download') == 1)
                            <a class="text-success" href="{{ url($video->content) }}" download>
                                <h4 class="pull-left" style="cursor: pointer;">
                                    <i class="fa fa-download"></i>&nbsp; Download&nbsp;
                                </h4>
                            </a>
                        @endif
                        <a href="#" data-id="{{ $video->id }}" class="pull-left watch_later"
                            style="cursor: pointer;" data-toggle="tooltip" data-placement="top"
                            title="Add to watch later">
                            <i class="fa fa-plus"></i>&nbsp;Add to&nbsp;
                        </a>
                        <a href="#" class="pull-right" style="cursor: pointer;" data-toggle="modal"
                            data-target="#reportModal">
                            <i class="fa fa-flag"></i>&nbsp; Report
                        </a>
                    </div>
                </div>
                <hr>
                <div class="publisher">
                    <img src="images/Jack.png" alt="">
                    <div>
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <span>250k Subscribers</span>
                    </div>
                    <button type="button">Subscribe</button>
                </div>
                <div class="vid-description">
                    @if (!empty($video->description))
                        <p>{!! html_entity_decode($video->description) !!}</p>
                    @endif

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
                        <a href="" class="small-thumbnail"><img src="{{ asset('storage/img/noimage.png') }}"
                                alt=""></a>
                        <div class="vid-info">
                            <a href="">No similar videos available</a>
                            <p>No Similar vieos found!</p>
                            {{-- <p>15k Views</p> --}}
                        </div>
                    </div>

                @endforelse
            </div>
        </div>
    </div>
</body>

</html>
