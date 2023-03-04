@extends('layouts.skeleton')
@section('title', 'Profil')
@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <div class="flex justify-center">
                    <h1 class="text-3xl text-gray-200 font-bold mb-8">Rekomendowane filmy</h1>
                </div>
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
                        <br />
                    @endif
                @endforeach
            </div>
            <div class="flex flex-col">
                <div class="flex justify-center">
                    <h1 class="text-3xl text-gray-200 font-bold mb-8">Rekomendowane seriale</h1>
                </div>
                @foreach ($recommendations as $recommendation)
                    @if (array_key_exists('name', $recommendation))
                        <a href="/tv-series/{{ $recommendation['id'] }}">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <img class="w-full h-64 object-cover" src="https://image.tmdb.org/t/p/w500{{ $recommendation['poster_path'] }}" alt="{{ $recommendation['name'] }}">
                                <div class="p-4">
                                    <h3 class="font-bold text-lg mb-2">{{ $recommendation['name'] }}</h3>
                                </div>
                            </div>
                        </a>
                        <br />
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
