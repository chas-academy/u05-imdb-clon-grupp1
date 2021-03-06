<nav x-data="{ open: false }" class="bg-transparent">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row-reverse h-16">

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                    {{ __('Home') }}
                </x-nav-link>
                @if (Route::has('login'))
                @auth
                <x-nav-link href="/profile/{{ auth()->user()->id }}" :active="request()->routeIs('profile.show')">
                    {{ __(Auth::user()->profile->title) }}
                </x-nav-link>

                <x-nav-link href="/watchlist/{{ auth()->user()->id }}" :active="request()->routeIs('watchlist.index')">
                    {{ __('Watchlist') }}
                </x-nav-link>
                @auth
                @if (Auth::user()->isRole() == 'admin')
                <x-nav-link href="/admin" :active="request()->routeIs('admin')">
                    Admin
                </x-nav-link>
                @endif
                @endauth
                @else
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
                @if (Route::has('register'))
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-nav-link>
                @endif
                @endauth
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-indigo-900 focus:outline-none focus:bg-indigo-900 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden animate-pulse" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            @if (Route::has('login'))
            @auth
            <x-responsive-nav-link :href="route('profile.show', Auth::user()->id)" :active="request()->routeIs('profile.show')">
                {{ __(Auth::user()->name) }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="/watchlist/{{ auth()->user()->id }}" :active="request()->routeIs('watchlist.index')">
                {{ __('Watchlist') }}
            </x-responsive-nav-link>

            @if (Auth::user()->isRole() == 'admin')
            <x-responsive-nav-link href="/admin" :active="request()->routeIs('admin')">
                Admin
            </x-responsive-nav-link>
            @endif
            @else
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Login') }}
            </x-responsive-nav-link>
            @if (Route::has('register'))
            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('Register') }}
            </x-responsive-nav-link>
            @endif
            @endauth
            @endif
        </div>
    </div>
</nav>
