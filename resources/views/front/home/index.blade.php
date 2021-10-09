<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <meta name="author" content="{{ url('/') }}">

    <title>@if (isset($page_title)){{ $page_title . ' - ' }}@endif {{ config('app.site_name') }} </title>

    <link rel="shortcut icon" href="{{ url('favicon.png') }}" />

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

    <!--Sidebar-->
    <div class="sidebar">
        <div class="shortcut-links">
            <a href=""><img src="{{ asset('storage/img/home.png') }}" alt="">
                <p>Home</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/explore.png') }}" alt="">
                <p>Explore</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/subscriprion.png') }}" alt="">
                <p>Subscription</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/library.png') }}" alt="">
                <p>Library</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/history.png') }}" alt="">
                <p>History</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/playlist.png') }}" alt="">
                <p>Playlist</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/messages.png') }}" alt="">
                <p>Messages</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/show-more.png') }}" alt="">
                <p>Show More</p>
            </a>
            <hr>
        </div>
        <div class="subscribed-list">
            <h3>SUBSCRIBED</h3>
            <a href=""><img src="{{ asset('storage/img/Jack.png') }}" alt="">
                <p>Jack Nicholson</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/simon.png') }}" alt="">
                <p>Simon Baker</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/tom.png') }}" alt="">
                <p>Tom Hardy</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/megan.png') }}" alt="">
                <p>Megan Ryan</p>
            </a>
            <a href=""><img src="{{ asset('storage/img/cameron.png') }}" alt="">
                <p>Cameron Diaz</p>
            </a>
        </div>
    </div>

    <!--- Main Body -->
    <div class="container">
        {{-- <div class="banner">
            <img src="{{ asset('storage/img/banner.png') }}" alt="">
        </div> --}}

        <div class="list-container">

            @forelse ($videos as $video)
                <div class="vid-list">
                    <a href="{{$video->url}}">
                        <img src="{{$video->thumb}}" alt="Thumbnail" class="{{$video->title}}">
                    </a>
                    <div class="flex-div">
                        <img src="{{ asset('storage/img/Jack.png') }}" alt="">
                        <div class="vid-info">
                            <a href="{{$video->url}}">{{$video->title}}</p>
                            <p>{{$video->views}} Views &bull; {{$video->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse

        </div>
    </div>

    <script src="{{ asset('js/scripts.js')}}"></script>
</body>

</html>
