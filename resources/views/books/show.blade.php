@php
    use Illuminate\Support\Facades\Auth as FacadesAuth;
    $userData = FacadesAuth::user();
@endphp

<x-layout returnButton="/" :default="false">

    <div class="w-[360px] h-[560px] bg-gray-300 mt-[100px] rounded-2xl">
        <img src="{{ $book['image_url'] ?? 'https://via.placeholder.com/120x180' }}"" alt="Book Cover"
            class="w-full h-full object-cover rounded-2xl">
    </div>

    <x-header>
        <x-slot:header>{{ $book['title'] ?? 'Title' }}</x-slot:header>
        <x-slot:buttons>



            @if ($userData['role_id'] != 3)
                <button class="btn btn-info btn-lg w-1/2">
                    <a href="/books/edit/{{ $book['id'] }}" class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-[35px] font-extrabold text-white">edit</span>
                    </a>
                </button>
                <form action="/book/{{ $book['id'] }}" method="POST" class="w-1/2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error btn-lg w-full">
                        <span class="material-symbols-outlined text-[35px] font-extrabold text-white">delete</span>
                    </button>
                </form>
            @else
                @if ($book['user_id'] && $book['user_id'] === $userData['id'])
                    <button type="submit"
                        class="w-[200px] btn text-white bg-gray-600 hover:bg-gray-500 px-6 py-2 font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 btn-lg text-xl">
                        Borrowed
                    </button>
                @elseif ($book['user_id'])
                    <button type="submit"
                        class="w-[200px] btn text-white bg-gray-600 hover:bg-gray-500 px-6 py-2 font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 btn-lg text-xl">
                        Not available
                    </button>
                @else
                    <form action="/book/borrow/{{ $book['id'] }}" method="POST" class="w-1/2">
                        @csrf
                        <button type="submit"
                            class="w-[200px] btn text-white bg-indigo-600 hover:bg-indigo-500 px-6 py-2 font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 btn-lg text-xl">
                            Borrow
                        </button>
                    </form>
                @endif
            @endif




        </x-slot:buttons>

    </x-header>

    <!-- Book Details -->
    <div class="space-y-2 text-2xl">
        <p class="text-gray-800 font-medium">
            <span class="font-bold">Author:</span> {{ $book['author'] ?? 'Unknown' }}
        </p>
        <p class="text-gray-800 font-medium">
            <span class="font-bold">Category:</span>
            @foreach ($book->categories as $category)
                {{ $category->name }}@if (!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
        <p class="text-gray-800 font-medium">
            <span class="font-bold">ISBN:</span> {{ $book['ISBN'] ?? 'Not available' }}
        </p>
        <p class="text-gray-800 font-medium">
            <span class="font-bold">Publication Year:</span> {{ $book['publication_year'] ?? 'Not available' }}
        </p>
    </div>

    <!-- Book Description -->
    <p class="mt-6 text-justify text-gray-700 leading-relaxed text-2xl">
        &emsp;&emsp;&emsp;{{ $book['description'] ?? '' }}
    </p>




</x-layout>
