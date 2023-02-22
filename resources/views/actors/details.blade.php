@extends('layouts.skeleton')
@section('title', 'Aktorzy')
@section('content')
    <div class="bg-gray-800">
        <div class="pt-6">
            <div class="lg:col-span-2 lg:pr-8" style="margin-left: 20; display: inline-block;">
                <div style="float: left; margin-right: 2%">
                    <h3 class="text-sm text-gray-300">
                        <div>
                            <a href="/actors/{{ $actres['id'] }}">
                                <div style="text-align: center; margin: 2%;">
                                    <img src="https://image.tmdb.org/t/p/w400{{ $actres['profile_path'] }}" alt=""
                                        class="h-full w-full object-cover object-center">
                                    </p>
                                </div>
                            </a>
                        </div>
                    </h3>
                </div><br />
                <h1 class="text-2xl font-bold tracking-tight text-gray-200 sm:text-3xl">{{ $actres['name'] }}</h1>
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
                </div>
                @auth
                    <form class="mt-1" style="float: left;" action="" method="GET">
                    <button type="submit" id="to_watched"
                        class="inline-block px-6 py-2 border-2 border-blue-600 text-gray-200 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">{{ __('message.actres_follow') }}
                    </button>
                    </form>
                    <br /><br />
                @endauth
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.actres_biography') }}</b>
                    <p>{{ $actres['biography'] }}</p>
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.actres_birthday') }}</b>
                    <span
                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $actres['birthday'] }}</span>
                </h3><br />
                <h3 class="text-sm font-medium text-gray-200"><b>{{ __('message.actres_place_of_birth') }}</b>
                    <span
                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $actres['place_of_birth'] }}</span>
                </h3><br />
            </div><br />
            <h2 class="text-2xl font-bold tracking-tight text-gray-200">
                {{ __('message.actres_movie') }}{{ $actres['name'] }}
            </h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-9">
                <div>
                    <h3 class="text-sm text-gray-300">
                        <div style="display: flex;">
                            @foreach ($actresMovie as $movie)
                                <a href="/movies/{{ $movie['id'] }}">
                                    <div style="text-align: center; margin: 5px;">
                                        <img src="https://image.tmdb.org/t/p/w300{{ $movie['poster_path'] }}"
                                            alt="{{ $movie['title'] }}" class="h-full w-full object-cover object-center">
                                        <p style="margin: 8px 0;"><b>{{ $movie['title'] }}</b>
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </h3>
                </div>
            </div>
            <h2 class="text-2xl font-bold tracking-tight text-gray-200">
                {{ __('message.actres_tv') }}{{ $actres['name'] }}
            </h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-9">
                <div>
                    <h3 class="text-sm text-gray-300">
                        <div style="display: flex;">
                            @foreach ($actresTv as $tv)
                                <a href="/tv-series/{{ $tv['id'] }}">
                                    <div style="text-align: center; margin: 5px;">
                                        <img src="https://image.tmdb.org/t/p/w300{{ $tv['poster_path'] }}"
                                            alt="{{ $tv['name'] }}" class="h-full w-full object-cover object-center">
                                        <p style="margin: 8px 0;"><b>{{ $tv['name'] }}</b>
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
