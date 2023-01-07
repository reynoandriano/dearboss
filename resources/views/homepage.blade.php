<x-main-layout page-title="Dear Boss, apa kabar hari ini?"
    page-description="Dear Boss, sudahkah anda bahagia hari ini? Kami siap laksanakan perintah memberi kebahagian bagi seluruh warganet."
    cover-image="{{ config('app.url') . $posts[0]['image'] }}"
    cover-type="image/webp"
    upload-button="true">

    <main class="min-h-full">
        <div class="max-h-screen overflow-y-scroll snap snap-y snap-mandatory">
            <h1 class="sr-only">Dear Boss! Siap laksanakan perintah.</h1>
            @foreach ($posts as $post)
            <section
                class="relative w-full h-screen grid place-items-center text-gray-800 dark:text-gray-300 bg-white dark:bg-black snap-start">
                <a href="/p/{{ $post['id'] }}">
                    <picture>
                        <source srcset="{{ $post['image'] }}" type="image/webp" />
                        <source srcset="/images/bossbaby.jpg" type="image/jpeg" />
                        <img src="{{ $post['image'] }}" width="640" height="626" alt="{{ $post['text'] }}"
                            title="{{ $post['text'] }}" loading="{{ $post['loading'] }}" />
                    </picture>
                </a>
                <div class="absolute bottom-1/3 right-0 z-40 mr-2">
                </div>
                <blockquote
                    class="absolute bottom-0 left-0 bg-gradient-to-b from-transparent to-black p-4 pb-6 md:flex md:flex-grow md:flex-col">

                    <p class="relative text-sm font-light text-gray-300 drop-shadow-md line-clamp-2 md:flex-grow">{{
                        $post['text'] }}</p>
                    <figure class="relative mt-2">
                        <div class="flex items-start">
                            <div class="inline-flex flex-shrink-0 rounded-full border-2 border-gray-300">
                                <picture>
                                    <source srcset="/images/bossbaby.webp" type="image/webp" />
                                    <source srcset="/images/bossbaby.jpg" type="image/jpeg" />
                                    <img class="h-12 w-12 rounded-full" src="/images/bossbaby.jpg" width="96"
                                        height="96" alt="Boss Baby" title="Boss Baby"
                                        loading="{{ $post['loading'] }}" />
                                </picture>
                            </div>
                            <div class="ml-4">
                                <div class="text-base font-medium text-white mb-1">Boss Baby</div>
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <button type="button"
                                        class="inline-flex items-center py-1 px-2 text-xs font-light text-gray-900 bg-transparent rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                        <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        1D
                                    </button>
                                    <button type="button"
                                        class="inline-flex items-center py-1 px-2 text-xs font-light text-gray-900 bg-transparent border-t border-b border-r border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                        <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                        </svg>
                                        0
                                    </button>
                                    <button type="button"
                                        class="inline-flex items-center py-1 px-2 text-xs font-light text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                        <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97zM6.75 8.25a.75.75 0 01.75-.75h9a.75.75 0 010 1.5h-9a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H7.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        0
                                    </button>
                                    <button type="button"
                                        class="inline-flex items-center py-1 px-2 text-xs font-light text-gray-900 bg-transparent rounded-r-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                        <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M15.75 4.5a3 3 0 11.825 2.066l-8.421 4.679a3.002 3.002 0 010 1.51l8.421 4.679a3 3 0 11-.729 1.31l-8.421-4.678a3 3 0 110-4.132l8.421-4.679a3 3 0 01-.096-.755z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        0
                                    </button>
                                </div>
                            </div>
                        </div>
                    </figure>
                </blockquote>
            </section>
            @endforeach
        </div>
    </main>
</x-main-layout>
