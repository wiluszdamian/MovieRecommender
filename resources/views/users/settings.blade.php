@extends('layouts.skeleton')
@section('title', 'Ustawienia')
@section('content')
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-300">{{ __('message.settings_user') }}</h3>
                    <p class="mt-1 text-sm text-gray-200">{{ __('message.settings_user_description') }}</p>
                </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form action="{{ route('user.update') }}" method="POST">
                    @csrf
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name"
                                        class="block text-sm font-medium text-gray-700">{{ __('message.settings_username') }}</label>
                                    <input type="text" name="name" id="name" autocomplete="given-name"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="{{ $user->name }}">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">{{ __('message.settings_email') }}</label>
                                    <input type="email" name="email" id="email" autocomplete="email"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="{{ $user->email }}">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="country"
                                        class="block text-sm font-medium text-gray-700">{{ __('message.settings_language') }}</label>
                                    <select id="country" name="country" autocomplete="country-name"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option>Polski</option>
                                        <option>English</option>
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="now_password"
                                        class="block text-sm font-medium text-gray-700">{{ __('message.settings_now_password') }}</label>
                                    <input type="password" name="now_password" id="now_password" autocomplete="email"
                                        minlength="6"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="********">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="currently_password"
                                        class="block text-sm font-medium text-gray-700"><b>{{ __('message.settings_current_password') }}</b></label>
                                    <input type="password" name="currently_password" id="currently_password" minlength="6"
                                        autocomplete="email"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="********">
                                </div>

                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('message.settings_save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br /><br />
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-300">{{ __('message.settings_notifications') }}</h3>
                    <p class="mt-1 text-sm text-gray-200">{{ __('message.settings_notifications_description') }}</p>
                </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form action="#" method="POST">
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <fieldset>
                                <div class="text-base font-medium text-gray-900" aria-hidden="true">
                                    {{ __('message.settings_notifications_saving') }}</div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="comments" name="comments" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="comments"
                                                class="font-medium text-gray-700">{{ __('message.settings_notifications_movies') }}</label>
                                            <p class="text-gray-500">
                                                {{ __('message.settings_notifications_movies_description') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="candidates" name="candidates" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="candidates"
                                                class="font-medium text-gray-700">{{ __('message.settings_notifications_tv') }}</label>
                                            <p class="text-gray-500">
                                                {{ __('message.settings_notifications_tv_description') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                {{ __('message.settings_save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
