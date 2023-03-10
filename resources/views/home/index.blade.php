@extends('layouts.skeleton')
@section('title', 'Strona główna')
@section('content')
    <p class="center medium-w-lg text-3xl font-semibold leading-normal text-gray-900 dark:text-white">
        {{ __('message.homepage_popular_movies') }}</p>
    <div class="popularMovies" style="display: flex;">
        @foreach ($popularMovies as $movie)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
                style="display: flex; flex-direction: column; width: 20%; margin: 0.5%">
                <a href="/movies/{{ $movie['id'] }}">
                    <img class="rounded-t-lg" src="https://image.tmdb.org/t/p/w300{{ $movie['poster_path'] }}"
                        alt="{{ $movie['title'] }}" />
                </a>
                <div class="p-5">
                    <a href="/movies/{{ $movie['id'] }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $movie['title'] }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>{{ __('message.release_date') }}
                        </b>{{ $movie['release_date'] }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>{{ __('message.vote') }}
                        </b>{{ $movie['vote_average'] }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>{{ __('message.description') }}
                        </b>{{ str_limit($movie['overview'], 150) }}</p>
                    <a href="/movies/{{ $movie['id'] }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('message.read_more') }}
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <br />
    <p class="center medium-w-lg text-3xl font-semibold leading-normal text-gray-900 dark:text-white">
        {{ __('message.homepage_popular_tvs') }}</p>
    <div class="popularMovies" style="display: flex;">
        @foreach ($popularTvSeries as $tvSerie)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
                style="display: flex; flex-direction: column; width: 20%; margin: 0.5%">
                <a href="/tv-series/{{ $tvSerie['id'] }}">
                    <img class="rounded-t-lg" src="https://image.tmdb.org/t/p/w300{{ $tvSerie['poster_path'] }}"
                        alt="{{ $tvSerie['name'] }}" />
                </a>
                <div class="p-5">
                    <a href="/tv-series/{{ $tvSerie['id'] }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $tvSerie['name'] }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>{{ __('message.release_date') }}
                        </b>{{ $tvSerie['first_air_date'] }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>{{ __('message.vote') }}
                        </b>{{ $tvSerie['vote_average'] }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>{{ __('message.description') }}
                        </b>{{ str_limit($tvSerie['overview'], 150) }}</p>
                    <a href="/tv-series/{{ $tvSerie['id'] }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('message.read_more') }}
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <p class="center medium-w-lg text-3xl font-semibold leading-normal text-gray-900 dark:text-white">
        {{ __('message.homepage_popular_persons') }}</p>
    <div class="popularMovies" style="display: flex;">
        @foreach ($trendingPersons as $trendingPerson)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
                style="display: flex; flex-direction: column; width: 20%; margin: 0.5%">
                <a href="/actors/{{ $trendingPerson['id'] }}">
                    <img class="rounded-t-lg" src="https://image.tmdb.org/t/p/w300{{ $trendingPerson['profile_path'] }}"
                        alt="{{ $trendingPerson['name'] }}" />
                </a>
                <div class="p-5">
                    <a href="/actors/{{ $trendingPerson['id'] }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $trendingPerson['name'] }}</h5>
                    </a>
                    <a href="/actors/{{ $trendingPerson['id'] }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('message.read_more') }}
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
