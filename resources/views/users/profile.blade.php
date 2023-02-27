@extends('layouts.skeleton')
@section('title', 'Profil')
@section('content')
    <div class="flex flex-col">
        <div class="flex flex-wrap justify-center text-gray-200">
                <div class="text-center">
                    <h3 class="text-2xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                        Profil użytkownika: {{ Auth::user()->name }}
                    </h3>
                </div>
        </div>
        <div>
            <h1 class="center medium-w-lg text-2xl text font-bold text-gray-200">Filmy i seriale dodane do obejrzenia: {{ $watchlistMoviesCount + $watchlistTVSeriesCount }}</h1>
            <div class="grid grid-cols-5 gap-4">
                @foreach ($watchlistMovies as $movie)
                    <div class="flex flex-col items-center">
                        <a href="{{ route('movie', $movie['id']) }}">
                            <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" >
                        </a>
                        <a href="/movies/{{ $movie['id'] }}">
                            <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-200 dark:text-white">
                                {{ $movie['title'] }}</h5>
                        </a>
                        <form action="{{ route('movie.remove.watchlist', ['id' => $movie['id'], 'type' => 'movie']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-2 px-4 py-1 bg-red-600 text-white rounded hover:bg-red-700">Usuń</button>
                        </form>
                    </div>
                @endforeach
                @foreach ($watchlistTVSeries as $tvSeries)
                    <div class="flex flex-col items-center">
                        <a href="{{ route('tvSerie', $tvSeries['id']) }}">
                            <img src="https://image.tmdb.org/t/p/w200{{ $tvSeries['poster_path'] }}" alt="{{ $tvSeries['name'] }}">
                        </a>
                        <a href="/tv-series/{{ $tvSeries['id'] }}">
                            <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-200 dark:text-white">
                                {{ $tvSeries['name'] }}</h5>
                        </a>
                        <form action="{{ route('tv.remove.watchlist', ['id' => $tvSeries['id'], 'type' => 'tv']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-2 px-4 py-1 bg-red-600 text-white rounded hover:bg-red-700">Usuń</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="my-8">
            <h1 class="center medium-w-lg text-2xl text font-bold mb-2 text-gray-200">Filmy i seriale obejrzane: {{ $watchedMoviesCount + $watchedTVSeriesCount }}</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($watchedMovies as $movie)
                    <div class="flex flex-col items-center">
                        <a href="{{ route('movie', $movie['id']) }}">
                            <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" >
                        </a>
                        <a href="/movies/{{ $movie['id'] }}">
                            <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-200 dark:text-white">
                                {{ $movie['title'] }}</h5>
                        </a>
                        <form method="POST" action="{{ route('movie.remove.watched', ['id' => $movie['id'], 'type' => 'movie']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mt-2">Usuń z listy</button>
                        </form>
                    </div>
                @endforeach
                @foreach ($watchedTVSeries as $tvSeries)
                    <div class="flex flex-col items-center">
                        <a href="{{ route('tvSerie', $tvSeries['id']) }}">
                            <img src="https://image.tmdb.org/t/p/w200{{ $tvSeries['poster_path'] }}" alt="{{ $tvSeries['name'] }}">
                        </a>
                        <a href="/tv-series/{{ $tvSeries['id'] }}">
                            <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-200 dark:text-white">
                                {{ $tvSeries['name'] }}</h5>
                        </a>
                        <form method="POST" action="{{ route('tv.remove.watched', ['id' => $tvSeries['id'], 'type' => 'tv']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mt-2">Usuń z listy</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="">
            <h1 class="center medium-w-lg text-2xl text font-bold mb-2 text-gray-200">Obserwowani aktorzy: {{ $watchedPersonsCount }}</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($watchedPersons as $watchedPerson)
                    <div class="flex flex-col items-center">
                        <a href="{{ route('person.details', $watchedPerson['id']) }}">
                            <img src="https://image.tmdb.org/t/p/w200{{ $watchedPerson['profile_path'] }}" alt="{{ $watchedPerson['name'] }}" >
                        </a>
                        <a href="/actors/{{ $watchedPerson['id'] }}">
                            <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-200 dark:text-white">
                                {{ $watchedPerson['name'] }}</h5>
                        </a>
                        <form method="POST" action="{{ route('actor.unfollow', ['id' => $watchedPerson['id']]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mt-2">Usuń z listy</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
