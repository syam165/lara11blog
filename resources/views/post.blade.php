<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="pt-8 pb-16 antialiased bg-white lg:pt-12 lg:pb-24 dark:bg-gray-900">
        <div class="flex justify-between max-w-screen-xl px-4 mx-auto ">
            <article class="w-full max-w-4xl mx-auto format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    {{-- Category --}}
                    <div class="mb-4 uppercase"><a href="/posts?category={{ $post->category->slug }}">
                        <span class="bg-{{ $post->category->color }}-100 text-gray-400 text-sm font-medium inline-flex items-center border px-3 py-1 rounded-full shadow-md hover:text-gray-700 dark:bg-primary-200 dark:text-primary-800">
                            {{ $post->category->name }}
                        </span>
                    </a></div>
                    {{-- Title --}}
                    <h1 class="text-3xl font-extrabold leading-tight text-gray-700 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
                </header>
                {{-- Post Excerpt --}}
                <div class="pb-2 pl-4 mb-4 ml-4 text-lg font-extrabold leading-tight text-gray-500 border-b border-l-8 border-sky-500">{{ $post->excerpt }}</div>
                {{-- Post Body --}}
                <div class="mb-4 text-lg font-medium text-gray-800">{!! $post->body !!}</div>

                {{-- Author --}}
                <div class="flex items-center px-8 mb-4 not-italic border rounded-full shadow-md">
                    <div class="inline-flex items-center">
                        <img class="w-16 h-16 mr-4 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="{{ $post->author->name }}">
                        <div>
                            <a href="/posts?author={{ $post->author->username }}" rel="author" class="text-base font-semibold text-gray-500 no-underline hover:underline dark:text-white">{{ $post->author->name }}</a>
                            <div class="text-sm text-gray-400 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>

                {{-- Link to all posts --}}
                <div class="my-4">
                    <a href="/posts" class="inline-flex items-center float-right px-3 py-1 text-base font-medium text-gray-500 no-underline bg-gray-100 border rounded-full shadow-md hover:bg-gray-200">&laquo; Back to all posts</a>
                </div>
            </article>
        </div>
    </main>
            
</x-layout>