<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">{{ __('message.open_main_menu') }}</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <img class="block h-8 w-auto lg:hidden"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png"
                        alt="MovieRecommender - Laravel App">
                    <img class="hidden h-8 w-auto lg:block"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png"
                        alt="MovieRecommender - Laravel App">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="/" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                            aria-current="page">{{ __('message.home') }}
                        </a>

                        <a href="{{ route("index") }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white rounded-md ">{{ __('message.navbar_search') }}
                        </a>
                    </div>
                </div>
            </div>
            @guest
                <div>
                    <button type="submit"
                        class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <a href="{{ route('register') }}">{{ __('message.sign_up') }}</a>
                    </button>
                </div>
                <div>
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">{{ __('message.sign_in') }}</a>
                </div>
            @endguest
            @auth
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                class="button-nav flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">{{ __('message.open_user_menu') }}</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://www.wpbeginner.com/wp-content/uploads/2012/08/gravatarlogo.jpg"
                                    alt="">
                            </button>
                        </div>
                        <div class="dropdown-nav absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">{{ __('message.your_profile') }}</a>
                            <a href="{{ route('settings') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">{{ __('message.settings') }}</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-2">{{ __('message.sign_out') }}</a>
                        </div>
                    </div>
                </div>
            @endauth
</nav>
