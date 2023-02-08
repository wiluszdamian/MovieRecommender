@extends('layouts.nav')
@section('title', 'TV Serie')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="bg-gray-800">
        <div class="pt-6">
            <!-- Image gallery -->
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                <div class="aspect-w-3 aspect-h-4 hidden overflow-hidden rounded-lg lg:block">
                    <img src="https://image.tmdb.org/t/p/w300{{ $tv_series['poster_path'] }}" alt="{{ $tv_series['name'] }}"
                        class="h-full w-full object-cover object-center">
                </div>
                <div class="">
                    <iframe width="500px" height="100%" src="https://www.youtube.com/embed/" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <br />

            <div class="lg:col-span-2 lg:pr-8" style="margin-left: 20;">
                <h1 class="text-2xl font-bold tracking-tight text-gray-200 sm:text-3xl">{{ $tv_series['name'] }}
                    ({{ date('Y', strtotime($tv_series['first_air_date'])) }})</h1><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.description') }}</b>
                    <p>{{ $tv_series['overview'] }}</p>
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.release_date') }}</b>
                    <span
                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tv_series['first_air_date'] }}</span>
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.genres') }}</b>
                    @foreach ($tv_series['genres'] as $genre)
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $genre['name'] }}</span>
                    @endforeach
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.numbers') }}</b>
                    <span
                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tv_series['number_of_seasons'] }}
                        {{ __('message.seasons') }}
                        | {{ $tv_series['number_of_episodes'] }} {{ __('message.episodes') }}</span>
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.creators') }}</b>
                    @foreach ($tv_series['created_by'] as $createdBy)
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $createdBy['name'] }}</span>
                    @endforeach
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.studio') }}</b>
                    @foreach ($tv_series['production_companies'] as $production)
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $production['name'] }}</span>
                    @endforeach
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.tagline') }}</b>
                    <span
                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tv_series['tagline'] }}</span>
                </h3><br />
            </div><br />
            <h2 class="text-2xl font-bold tracking-tight text-gray-200">{{ __('message.cast') }}</h2>

            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-9">
                <div>
                    <h3 class="text-sm text-gray-300">
                        <div style="display: flex;">
                            @foreach ($actors as $actor)
                                <a href="/actors/{{ $actor['id'] }}">
                                    <div style="text-align: center; margin: 5px;">
                                        <img src="https://image.tmdb.org/t/p/w300{{ $actor['profile_path'] }}"
                                            alt="{{ $actor['name'] }}" class="h-full w-full object-cover object-center">
                                        <p style="margin: 8px 0;"><b>{{ $actor['name'] }}</b> ({{ $actor['character'] }})
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
