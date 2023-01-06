<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#000">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dearboss">
    <meta name="twitter:image" content="{{ $coverImage }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:site_name" content="DearBoss">
    <meta property="og:description"  content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:image" content="{{ $coverImage }}">
    <meta property="og:type" content="website">
    <link rel="canonical" href="{{ Request::url() }}">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon-180.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/apple-touch-icon-152.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/apple-touch-icon-120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/apple-touch-icon-76.png">
    <link rel="preload" fetchpriority="high" as="image" href="{{ $coverImage }}" type="{{ $coverType }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-700 dark:bg-black dark:text-gray-200">
    <header class="absolute top-0 left-0 z-50 w-full p-4 flex justify-between">

        <div class="flex items-center overflow-hidden">
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9 text-red-500 drop-shadow-md">
                    <path d="M21.721 12.752a9.711 9.711 0 00-.945-5.003 12.754 12.754 0 01-4.339 2.708 18.991 18.991 0 01-.214 4.772 17.165 17.165 0 005.498-2.477zM14.634 15.55a17.324 17.324 0 00.332-4.647c-.952.227-1.945.347-2.966.347-1.021 0-2.014-.12-2.966-.347a17.515 17.515 0 00.332 4.647 17.385 17.385 0 005.268 0zM9.772 17.119a18.963 18.963 0 004.456 0A17.182 17.182 0 0112 21.724a17.18 17.18 0 01-2.228-4.605zM7.777 15.23a18.87 18.87 0 01-.214-4.774 12.753 12.753 0 01-4.34-2.708 9.711 9.711 0 00-.944 5.004 17.165 17.165 0 005.498 2.477zM21.356 14.752a9.765 9.765 0 01-7.478 6.817 18.64 18.64 0 001.988-4.718 18.627 18.627 0 005.49-2.098zM2.644 14.752c1.682.971 3.53 1.688 5.49 2.099a18.64 18.64 0 001.988 4.718 9.765 9.765 0 01-7.478-6.816zM13.878 2.43a9.755 9.755 0 016.116 3.986 11.267 11.267 0 01-3.746 2.504 18.63 18.63 0 00-2.37-6.49zM12 2.276a17.152 17.152 0 012.805 7.121c-.897.23-1.837.353-2.805.353-.968 0-1.908-.122-2.805-.353A17.151 17.151 0 0112 2.276zM10.122 2.43a18.629 18.629 0 00-2.37 6.49 11.266 11.266 0 01-3.746-2.504 9.754 9.754 0 016.116-3.985z" />
                </svg>
                <span class="sr-only">DearBoss</span>
            </a>
        </div>

        <div class="flex flex-1 justify-center px-2">
            {{-- <div class="w-full max-w-lg lg:max-w-xs">
                <label for="search" class="sr-only">Search</label>
                <div class="relative text-gray-200 focus-within:text-gray-400">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-4 w-4" x-description="Heroicon name: mini/magnifying-glass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input id="search" class="block w-full rounded-md border border-transparent bg-black/25 py-2 pl-8 pr-3 leading-5 text-gray-200 placeholder-gray-300 focus:border-white focus:outline-none focus:ring-1 focus:ring-white focus:ring-offset-1 focus:ring-offset-gray-600 text-sm" placeholder="Search" type="search" name="search">
                </div>
            </div> --}}
        </div>

        <div class="flex items-center">

            <div x-data="{ open: false }" @keydown.window.escape="open = false">    
                <div x-show="open" class="relative z-40 x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog" aria-modal="true" style="display: none;">
                    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75" x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state." style="display: none;"></div>
                    <div class="fixed inset-0 z-40 flex">
                        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-description="Off-canvas menu, show/hide based on off-canvas menu state." class="relative flex w-full max-w-xs flex-1 flex-col bg-black pt-5 pb-4" @click.away="open = false" style="display: none;">
                            <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Close button, show/hide based on off-canvas menu state." class="absolute top-0 right-0 -mr-12 pt-2" style="display: none;">
                                <button type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="open = false">
                                    <span class="sr-only">Close sidebar</span>
                                    <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/x-mark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-5 h-0 flex-1 overflow-y-auto">
                                <nav class="space-y-1 px-2">
                                    <a href="/trending" class="bg-red-500/75 text-white group flex items-center px-2 py-2 text-base font-light rounded-md" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-gray-900 text-white&quot;, Default: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">
                                        <svg class="text-gray-300 mr-4 flex-shrink-0 h-6 w-6" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;text-gray-300&quot;, Default: &quot;text-gray-400 group-hover:text-gray-300&quot;" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                        </svg>
                                        TRENDING
                                    </a>
                                    <a href="/fresh" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 pb-4 text-base font-light rounded-md" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">
                                        <svg class="text-gray-400 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6" x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;" x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                                        </svg>
                                        FRESH
                                    </a>
                                    @for ($i = 1; $i <= 10; $i++)<a href="/cantik" class="text-gray-400 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-base rounded-md" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">
                                        <svg class="text-gray-400 group-hover:text-gray-300 mr-2 flex-shrink-0 h-4 w-4" x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;" x-description="Heroicon name: outline/calendar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                        </svg>
                                        cantik
                                    </a>
                                    @endfor
                                </nav>

                                @auth
                                <div class="text-white text-center text-xs mt-8">{{ Auth::user()->email }}</div>
                                @endauth

                                <div class="absolute bottom-0 left-0 w-full mb-2 text-center">
                                    <a href="/about" class="text-gray-500 hover:bg-gray-700 hover:text-white px-2 py-1 text-xs font-base rounded-md">
                                        About
                                    </a>
                                    <a href="/privacy" class="text-gray-500 hover:bg-gray-700 hover:text-white px-2 py-1 text-xs font-base rounded-md">
                                        Privacy
                                    </a>
                                    <a href="/terms" class="text-gray-500 hover:bg-gray-700 hover:text-white px-2 py-1 text-xs font-base rounded-md">
                                        Terms
                                    </a>
                                    <a href="/disclaimer" class="text-gray-500 hover:bg-gray-700 hover:text-white px-2 py-1 text-xs font-base rounded-md">
                                        Disclaimer
                                    </a>

                                    <p class="text-gray-500 px-2 py-1 text-xs font-base mt-4">
                                        &copy;2023 DearBoss
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-40 flex-shrink-0" aria-hidden="true">
                        </div>
                    </div>
                </div>
            
                <button type="button" class="inline-flex items-center justify-center rounded-md bg-black/25 text-gray-200 mt-2 ml-2" aria-controls="mobile-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bars-3-bottom-left" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    {{ $slot }}
    
</body>

</html>
