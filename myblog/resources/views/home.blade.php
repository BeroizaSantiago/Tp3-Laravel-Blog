@extends('layouts.app')

@section('content')
    <div class="w-full">
        <img src="{{ asset('images/hero.jpg') }}" alt="Hero" class="w-full h-[500px] object-cover">
    </div>

    <div class="max-w-7xl mx-auto mt-12 space-y-12"> 
        <x-post :posts="$posts" :home="true"/> 
    </div>
@endsection