@extends('layouts.nav')
@section('title', 'Profile')

@section('content')
    <div class="bg-gray-800 text-gray-200">
        <div class="pt-6">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-800 w-full">
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                        <img class="h-60 w-60 rounded-full" src="{{ gravatar()->avatar($user->email) }}"
                            alt="{{ $userProfile->name }}">
                        <div class="mt-5 w-full px-4 text-center">
                            <div class="text-center">
                                <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                    {{ $userProfile->name }}
                                </h3>
                                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                    <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                    {{ $userProfile->country }}, {{ $userProfile->city }}
                                </div>
                            </div>
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        22
                                    </span>
                                    <span class="text-sm text-blueGray-400">{{ __('message.profile_watched') }}</span>
                                </div>
                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        10
                                    </span>
                                    <span class="text-sm text-blueGray-400">{{ __('message.profile_to_watched') }}</span>
                                </div>
                                <div class="lg:mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        89
                                    </span>
                                    <span class="text-sm text-blueGray-400">{{ __('message.profile_review') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                            {{ __('message.profile_about_me') }}
                        </h3>
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-4">
                                    {{ $userProfile->about_me }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
