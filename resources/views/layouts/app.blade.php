<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="flex h-screen">
                {{-- Left Column --}}
                <nav x-data="{ open: false }" class="hidden w-auto h-full px-6 py-4 bg-gray-200 border-r-2 shadow-lg sm:px-8 sm:w-1/4 dark:text-gray-200 dark:bg-gray-800 sm:block">
                    <div>
                        {{-- Logo --}}
                        <div class="flex items-center py-4 shrink-0">
                            <a href="/" target="_blank">
                                <x-application-logo class="block w-auto text-gray-500 fill-current h-9 dark:text-gray-200" />
                            </a>
                        </div>
                        
                        {{-- Left Menu --}}
                        <div class="py-3 border-b">
                            <div class="font-semibold">
                                <a href="{{ route('dashboard') }}" active="{{ request()->routeIs('dashboard') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </div>
                        </div>
                        <div class="py-3 border-b">
                            <div class="font-semibold">
                                <a href="{{ route('admin.posts') }}" active="{{ request()->routeIs('admin.posts') }}">
                                    {{ __('Manage Posts') }}
                                </a></div>
                            <div>
                                <a href="{{ route('admin.posts') }}" active="{{ request()->routeIs('admin.posts') }}">
                                    {{ __('Create New Post') }}
                                </a></div>
                        </div>
                        <div class="py-3 border-b">
                            <div class="font-semibold">
                                <a href="{{ route('admin.categories') }}" active="{{ request()->routeIs('admin.categories') }}">
                                    {{ __('Manage Categories') }}
                                </a>
                            </div>
                            <div>Create New Category</div>
                        </div>
                        <div class="py-3 border-b">
                            <div class="font-semibold">Manage Media</div>
                            <div>Create New Media</div>
                        </div>
                        <div class="py-3 border-b">
                            <div class="font-semibold">Manage Users</div>
                            <div>Create New User</div>
                        </div>
                    </div>
                    
                </nav>

                {{-- Right Colomn --}}
                <div class="flex-1 h-full bg-gray-100">
                    <!-- Page Heading -->
                    {{-- @isset($header) --}}
                    <header class="flex justify-between py-5 bg-white shadow dark:bg-gray-800">
                
                        <!-- Hamburger/Mobile menu -->
                        <div class="flex">
                            <div class="flex items-center -me-2 sm:hidden">
                                <button @click="open = ! open" class="inline-flex items-center justify-center p-1 ml-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            {{-- Header Title --}}
                            <div class="flex mx-4 md:mx-8">
                                {{ $header }}
                            </div>
                        </div>
                        
                        {{-- Profile Dropdown Menu --}}
                        <div class="sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 font-semibold leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md text-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                        <div class="pr-2">{{ Auth::user()->name }}</div>
                                        <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">

                                        <div class="ms-1">
                                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>

                    </header>
                    {{-- @endisset --}}
        
                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                    
                </div>
            </div>
        </div>
    </body>
</html>
