<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Search --}}
    <div class="max-w-screen-xl px-4 mx-auto lg:px-6">
        <div class="max-w-screen-md mx-auto sm:text-center">
            <form>
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if(request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="flex items-center max-w-screen-sm mx-auto mb-3 sm:flex sm:space-y-0">
                    <div class="relative flex-1">
                        <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        {{-- Search input --}}
                        <input class="block w-full p-3 pl-10 text-base text-gray-600 bg-white border-0 border-gray-300 rounded-full shadow-md focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your keyword to search..." type="search" id="search" name="search" autocomplete="off">
                    </div>
                    {{-- Search button: hidden --}}
                    <div class="flex-none w-fit">
                        <button type="submit" class="p-3 px-5 ml-1 text-base font-medium text-center text-gray-400 bg-white rounded-full shadow-md cursor-pointer w-fit hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 hover:font-semibold dark:focus:ring-primary-800">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   
    {{-- Listing Posts --}}
    <div class="max-w-screen-xl px-4 py-2 mx-auto lg:py-2 md:px-0 lg:px-0">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <article class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    {{-- Category --}}
                    <div class="flex items-center justify-between mb-3 text-gray-500">
                        <a href="/posts?category={{ $post->category->slug }}">
                            <span class="bg-{{ $post->category->color }}-100 text-gray-400 shadow text-xs font-medium uppercase inline-flex hover:text-gray-700 items-center px-2.5 py-0.5 rounded-full border dark:bg-gray-200 dark:text-gray-800">
                                {{ $post->category->name }}
                            </span>
                        </a>
                        <span class="text-xs font-extralight">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    {{-- Title --}}
                    <a href="/posts/{{ $post->slug }}" class="hover:underline">
                        <h2 class="mb-2 text-2xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                            {{ $post->title }}
                        </h2>
                    </a>
                    {{-- Post Excerpt --}}
                    <p class="mb-4 text-base leading-tight text-gray-500 dark:text-gray-400">
                        {{ $post->excerpt }}
                    </p>
                    <div class="flex items-center justify-between text-sm">
                        {{-- Author --}}
                        <a href="/posts?author={{ $post->author->username }}" class="hover:underline">
                            <div class="flex items-center space-x-2">
                                <img class="rounded-full w-7 h-7" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="{{ $post->author->name }}" />
                                <span class="font-normal dark:text-white">
                                    {{ $post->author->name }}
                                </span>
                            </div>
                        </a>
                        {{-- Read more --}}
                        <a href="/posts/{{ $post->slug }}" class="inline-flex items-center font-normal text-gray-600 dark:text-gray-500 hover:underline">
                            Read more
                            <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </article>
            @empty
                <div>
                    <p class="my-4 text-xl font-semibold">Article not found!</p>
                    <p><a href="/posts" class="text-blue-600 hover:underline">&laquo; Back to all posts</a></p>
                </div>
            @endforelse
        </div>
        
        {{-- Pagination --}}
        <div class="pt-6 pb-12">
            {{ $posts->onEachSide(3)->links() }}
        </div>
    </div>

</x-layout>