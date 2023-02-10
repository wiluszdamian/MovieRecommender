@extends('layouts.nav')
@section('title', 'Film')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="bg-gray-800">
        <div class="pt-6">
            <!-- Product info -->
            <div class="lg:col-span-2 lg:pr-8" style="margin-left: 20; display: inline-block;">
                <h1 class="text-2xl font-bold tracking-tight text-gray-200 sm:text-3xl">{{ $movie['title'] }}
                    ({{ date('Y', strtotime($movie['release_date'])) }})
                </h1>
                <p class="text-gray-200">{{ $movie['tagline'] }}</p><br />
                <div class="flex items-center review">
                    <p class="text-gray-200">{{ __('message.review') }} </p>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.first_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.second_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.third_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.fourth_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.fifth_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.sixth_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.seventh_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.eighth_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.ninth_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('message.ten_star') }}</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                </div><br />
                <button type="button" id="to_watched"
                    class="inline-block px-6 py-2 border-2 border-blue-600 text-gray-200 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">{{ __('message.to_watch') }}</button>
                <button type="button" id="watched"
                    class="inline-block px-6 py-2 border-2 border-blue-600 text-gray-200 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">{{ __('message.watched') }}</button>
                <br /><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.description') }}</b>
                    <p>{{ $movie['overview'] }}</p>
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.release_date') }}</b>
                    <span
                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $movie['release_date'] }}</span>
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.production') }}</b>
                    @foreach ($movie['production_countries'] as $productionCountries)
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $productionCountries['name'] }}</span>
                    @endforeach
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.runtime') }}</b>
                    <span
                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $movie['runtime'] }}
                        {{ __('message.min') }}</span>
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.genres') }}</b>
                    @foreach ($movie['genres'] as $genre)
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $genre['name'] }}</span>
                    @endforeach
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.budget') }}</b>
                    <span
                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $movie['budget'] }}
                        {{ __('message.currency') }}</span>
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.studio') }}</b>
                    @foreach ($movie['production_companies'] as $production)
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $production['name'] }}</span>
                    @endforeach
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
            <h2 class="text-2xl font-bold tracking-tight text-gray-200">
                {{ __('message.recommendation') }}{{ $movie['title'] }}
            </h2>

            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-9">
                <div>
                    <h3 class="text-sm text-gray-300">
                        <div style="display: flex;">
                            @foreach ($recommendations as $recommendation)
                                <a href="/movies/{{ $recommendation['id'] }}">
                                    <div style="text-align: center; margin: 5px;">
                                        <img src="https://image.tmdb.org/t/p/w300{{ $recommendation['poster_path'] }}"
                                            alt="{{ $recommendation['title'] }}"
                                            class="h-full w-full object-cover object-center">
                                        <p style="margin: 8px 0;"><b>{{ $recommendation['title'] }}</b>
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
