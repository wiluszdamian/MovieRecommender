@extends('layouts.skeleton')
@section('title', __('message.search'))
@section('content')
    <div class="container mx-auto mt-10">
        <div class="flex">
            <div class="w-1/4">
                <!-- Wyszukiwarka -->
                <form action="{{ route('search') }}" method="GET">
                    <label class="block text-gray-200 font-bold mb-2" for="year">
                        {{ __('message.search') }}
                    </label>
                    <input class="border border-gray-400 p-2 mb-4 w-full" type="text" name="query"
                        placeholder="Szukaj...">
                    <div class="mb-4">
                        <label class="block text-gray-200 font-bold mb-2">
                            {{ __('message.search_type') }}
                        </label>
                        <label class="block text-gray-200 font-bold mb-2">
                            <input type="checkbox" name="category[]" value="movie" checked>
                            {{ __('message.search_movies') }}
                        </label>
                        <label class="block text-gray-200 font-bold mb-2">
                            <input type="checkbox" name="category[]" value="tv">
                            {{ __('message.search_tvs') }}
                        </label>
                        <label class="block text-gray-200 font-bold mb-2">
                            <input type="checkbox" name="category[]" value="person">
                            {{ __('message.search_actors') }}
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-200 font-bold mb-2" for="year">
                            {{ __('message.search_year') }}
                        </label>
                        <input class="border border-gray-400 p-2 w-full" type="text" id="year" name="year"
                            placeholder="Wpisz rok">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-200 font-bold mb-2" for="genre">
                            {{ __('message.search_genres') }}
                        </label>
                        <select class="border border-gray-400 p-2 w-full" id="genre" name="genre">
                            <option value="">{{ __('message.search_select_genres') }}</option>
                            @foreach ($movieGenres as $genre)
                                <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-200 font-bold mb-2" for="country">
                            {{ __('message.search_countries') }}
                        </label>
                        <select class="border border-gray-400 p-2 w-full" id="country" name="country">
                            <option value="">{{ __('message.search_select_country') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country['iso_3166_1'] }}"
                                    @if (request()->input('country') == $country['iso_3166_1']) selected @endif>{{ $country['english_name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2" type="submit">
                            {{ __('message.search_apply') }}
                        </button>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4" type="reset">
                            {{ __('message.search_clear') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-3/4 ml-10">
                <h2 class="text-3xl font-bold mb-3 text-gray-200">{{ __('message.search_movies') }}</h2>
                @if (count($movies) > 0)
                    <div class="grid grid-cols-5 gap-3">
                        @foreach ($movies as $movie)
                            <div class="bg-gray-200 p-2">
                                <a href="{{ route('movie', ['id' => $movie['id']]) }}">
                                    <img src="https://image.tmdb.org/t/p/w200/{{ $movie['poster_path'] }}"
                                        alt="{{ $movie['title'] }}" class="mb-2">
                                    {{ $movie['title'] }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-200">{{ __('message.search_tvs') }}</p>
                @endif
                <h2 class="text-3xl font-bold my-3 text-gray-200">{{ __('message.search_tvs') }}</h2>
                @if (count($tvSeries) > 0)
                    <div class="grid grid-cols-5 gap-3">
                        @foreach ($tvSeries as $tvSerie)
                            <div class="bg-gray-200 p-2">
                                <a href="{{ route('tvSerie', ['id' => $tvSerie['id']]) }}">
                                    <img src="https://image.tmdb.org/t/p/w200/{{ $tvSerie['poster_path'] }}"
                                        alt="{{ $tvSerie['name'] }}" class="mb-2">
                                    {{ $tvSerie['name'] }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-200">{{ __('message.search_tvs_not_found') }}</p>
                @endif
                <h2 class="text-3xl font-bold my-3 text-gray-200">{{ __('message.search_actors') }}</h2>
                @if (count($actors) > 0)
                    <div class="grid grid-cols-5 gap-3">
                        @foreach ($actors as $actor)
                            <div class="bg-gray-200 p-2">
                                <a href="{{ route('tvSerie', ['id' => $actor['id']]) }}">
                                    <img src="https://image.tmdb.org/t/p/w200/{{ $actor['profile_path'] }}"
                                        alt="{{ $actor['name'] }}" class="mb-2">
                                    {{ $actor['name'] }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-200">{{ __('message.search_actors_not_found') }}</p>
                @endif
            @endsection
