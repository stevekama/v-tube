<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="{{ url('/') }}">

    <title>@if (isset($page_title)){{ $page_title . ' - ' }}@endif {{ config('app.site_name') }} </title>

    <link rel="shortcut icon" href="{{ url('favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @yield('show_scripts')
</head>

<body>
    <!-- header -->
    <nav class="flex-div">
        <div class="nav-left flex-div">
            <img src="{{ asset('storage/img/menu.png') }}" class="menu-icon" alt="Menu Icon" />
            <a href="{{ route('home') }}">
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
            <img src="{{ asset('storage/img/upload.png') }}" alt="">
            <img src="{{ asset('storage/img/more.png') }}" alt="">
            <img src="{{ asset('storage/img/notification.png') }}" alt="">
            <img src="{{ asset('storage/img/Jack.png') }}" class="user-icon" alt="User Profile">
        </div>
    </nav>

    @yield('sidebar')
    
    @yield('content')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>
</body>

</html>
