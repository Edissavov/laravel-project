<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">From the blog</h2>
            <p class="mt-2 text-lg/8 text-gray-600">Learn how to grow your business with our expert advice.</p>
        </div>


        <div class="flex gap-4">
            @foreach ($categories as $category)
                <button
                    wire:click="filterBlogsByCategoryId({{$category->id}})"
                    class="border text-gray-700 rounded-full p-2 cursor-pointer hover:text-black">
                    
                    {{ $category->title }}
                </button>
            @endforeach
        </div>

        <div
            class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

            @foreach ($blogs as $blog)
                @if ($blog->is_published)
                    <article class="flex max-w-xl flex-col items-start justify-between">

                        <a wire:navigate.hover href="/blogs/{{ $blog->slug }}">
                            <img src="/storage/{{ $blog->thumbnail }}" alt="">
                        </a>

                        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                            <a wire:navigate.hover href="/blogs/{{ $blog->slug }}">
                                <span class="inset-0 hover:text-red-500">{{ $blog->title }}</span>
                            </a>
                        </h3>

                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="2020-03-16"
                                class="text-gray-500">{{ $blog->created_at->diffForHumans() }}</time>
                            <a href="#"
                                class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $blog->category->title }}</a>
                        </div>
                        <div class="group relative">
                            <div class="flex gap-1">
                                @foreach ($blog->tags as $tag)
                                    <p class="border border-yellow-500 rounded-full p-2 text-sm text-gray-700">
                                        {{ $tag->title }} </p>
                                @endforeach
                            </div>

                            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ $blog->description }}</p>
                        </div>
                        <div class="relative mt-8 flex items-center gap-x-4">

                            <div class="text-sm/6">
                                <p class="font-semibold text-gray-900">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        {{ $blog->author->name }}
                                    </a>
                                </p>

                            </div>
                        </div>
                    </article>
                @endif
            @endforeach

        </div>
    </div>
</div>
