@extends('layouts.home')
@section('content')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class=" my-5">
                <h1 class="fw-bolder">{{ $post->title }}</h1>
                <h4 class="lead mb-0">{{ $post->text }}</h4>
                <br>
                <small class=" mb-0">Category : {{ $post->category->name }}</small>
            </div>
        </div>
    </header>
@endsection
