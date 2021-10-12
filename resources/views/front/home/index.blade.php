@extends('front.layouts.app')

@section('content')
    @section('sidebar')
        @include('front.layouts.sidebar')
    @endsection
    <!--- Main Body -->
    <div class="main-container">
        {{-- 
            <div class="banner">
                <img src="{{ asset('storage/img/banner.png') }}" alt="">
            </div> 
        --}}
        <div class="list-container">

            @forelse ($videos as $video)
                <div class="vid-list">
                    <a href="{{ $video->url }}">
                        <img src="{{ $video->thumb }}" alt="Thumbnail" class="{{ $video->title }}">
                    </a>
                    <div class="flex-div">
                        <img src="{{ asset('storage/img/Jack.png') }}" alt="">
                        <div class="vid-info">
                            <a href="{{ $video->url }}">{{ $video->title }}</p>
                                <p>{{ $video->views }} Views &bull; {{ $video->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse

        </div>
    </div>
@endsection
