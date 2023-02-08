@extends('layouts.nav')
@section('title', 'Forgot Password')

@section('content')
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                @if (Session::has('message'))
                    <div class="alert border border-red-400 text-gray-900 px-4 py-3 rounded relative {{ Session::get('alert-class', 'bg-red-100') }}"
                        role="alert">
                        <span class="block sm:inline">{{ Session::get('message') }}</span>
                    </div>
                @endif
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-300">
                    {{ __('message.forgot_password') }}</h2><br />
                <p class="text-center tracking-tight text-gray-300">{{ __('message.forgot_info') }}</p>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <input type="hidden" name="remember" value="true">
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email" class="sr-only">{{ __('message.email_address') }}</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                            placeholder="{{ __('message.email_address') }}">
                    </div>
                    <div>
                        <label for="username" class="sr-only">{{ __('message.username') }}</label>
                        <input id="username" name="username" type="text" autocomplete="current-password" required
                            class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                            placeholder="{{ __('message.username') }}">
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <!-- Heroicon name: mini/lock-closed -->
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        {{ __('message.send_reminder') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
