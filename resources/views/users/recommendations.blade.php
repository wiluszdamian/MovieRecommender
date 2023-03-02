@extends('layouts.skeleton')
@section('title', 'Profil')
@section('content')
    <div class="flex justify-center">
        <h1 class="text-3xl font-bold mb-8">Rekomendacje</h1>
    </div>
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($recommendations as $recommendation)
                @if (array_key_exists('title', $recommendation))
                    <a href="/movies/{{ $recommendation['id'] }}">
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <img class="w-full h-64 object-cover" src="https://image.tmdb.org/t/p/w500{{ $recommendation['poster_path'] }}" alt="{{ $recommendation['title'] }}">
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2">{{ $recommendation['title'] }}</h3>
                        </div>
                    </div>
                    </a>
                @endif
                    @if (array_key_exists('name', $recommendation))
                        <a href="/tv-series/{{ $recommendation['id'] }}">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <img class="w-full h-64 object-cover" src="https://image.tmdb.org/t/p/w500{{ $recommendation['poster_path'] }}" alt="{{ $recommendation['name'] }}">
                                <div class="p-4">
                                    <h3 class="font-bold text-lg mb-2">{{ $recommendation['name'] }}</h3>
                                </div>
                            </div>
                        </a>
                    @endif
            @endforeach
        </div>
    </div>
@endsection
