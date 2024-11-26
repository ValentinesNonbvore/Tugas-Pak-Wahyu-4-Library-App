@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-xl text-gray-700 leading-5 dark:text-gray-400">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="relative inline-flex items-center px-6 py-3 -ml-px text-xl font-medium text-white cursor-default rounded-l-md leading-5 transition ease-in-out duration-150"
                                style="background-color: #3500d1; border-color: #3f00e7; dark:bg: #3f00e7; dark:border: #3f00e7; dark:text-white; dark:hover:bg: #3500d1; dark:active:bg: #2f00b5; dark:focus:border: #3500d1;"
                                aria-hidden="true">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="cursor-pointer relative inline-flex items-center px-6 py-3 -ml-px text-xl font-medium text-white cursor-default rounded-l-md leading-5 transition ease-in-out duration-150"
                            style="background-color: #3f00e7; border-color: #3f00e7; hover:bg: #3500d1; focus:ring: #3f00e7; focus:border: #3500d1; active:bg: #2f00b5; active:text-white; dark:bg: #3f00e7; dark:border: #3f00e7; dark:text-white; dark:hover:bg: #3500d1; dark:active:bg: #2f00b5; dark:focus:border: #3500d1;"
                            aria-label="{{ __('pagination.previous') }}"
                            onmouseover="this.style.backgroundColor='#3500d1'; this.style.borderColor='#3500d1';"
                            onmouseout="this.style.backgroundColor='#3f00e7'; this.style.borderColor='#3f00e7';">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif


                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-6 py-3 -ml-px text-xl font-medium cursor-default leading-5 transition ease-in-out duration-150"
                                    style="background-color: #3f00e7; border-color: #3f00e7; color: white; dark:bg: #3f00e7; dark:border: #3f00e7; dark:text-white; dark:hover:bg: #3500d1; dark:active:bg: #2f00b5; dark:focus:border: #3500d1;">
                                    {{ $element }}
                                </span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="h-full relative inline-flex items-center px-6 py-3 -ml-px text-xl font-medium cursor-default leading-5"
                                            style="background-color: #3500d1; border-color: #3f00e7; color: white; transition: background-color 0.3s, border-color 0.3s;">
                                            {{ $page }}
                                        </span>
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center px-6 py-3 -ml-px text-xl font-medium leading-5"
                                        style="background-color: #3f00e7; border-color: #3f00e7; color: white; transition: background-color 0.3s, border-color 0.3s;"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                        onmouseover="this.style.backgroundColor='#3500d1'; this.style.borderColor='#3500d1';"
                                        onmouseout="this.style.backgroundColor='#3f00e7'; this.style.borderColor='#3f00e7';">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="cursor-pointer relative inline-flex items-center px-6 py-3 -ml-px text-xl font-medium text-white cursor-default rounded-r-md leading-5 transition ease-in-out duration-150"
                            style="background-color: #3f00e7; border-color: #3f00e7; hover:bg: #3500d1; focus:ring: #3f00e7; focus:border: #3500d1; active:bg: #2f00b5; active:text-white; dark:bg: #3f00e7; dark:border: #3f00e7; dark:text-white; dark:hover:bg: #3500d1; dark:active:bg: #2f00b5; dark:focus:border: #3500d1;"
                            aria-label="{{ __('pagination.next') }}"
                            onmouseover="this.style.backgroundColor='#3500d1'; this.style.borderColor='#3500d1';"
                            onmouseout="this.style.backgroundColor='#3f00e7'; this.style.borderColor='#3f00e7';">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="relative inline-flex items-center px-6 py-3 -ml-px text-xl font-medium text-white cursor-default rounded-r-md leading-5 transition ease-in-out duration-150"
                                style="background-color: #3500d1; border-color: #3f00e7; dark:bg: #3f00e7; dark:border: #3f00e7; dark:text-white; dark:hover:bg: #3500d1; dark:active:bg: #2f00b5; dark:focus:border: #3500d1;"
                                aria-hidden="true">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif


                </span>
            </div>
        </div>
    </nav>
@endif
