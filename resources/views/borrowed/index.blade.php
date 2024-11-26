@php
    use Illuminate\Support\Facades\Auth as FacadesAuth;
    $userData = FacadesAuth::user();
@endphp

<x-layout returnButton="">
    <x-slot:header>Borrowed Books</x-slot:header>
    <x-slot:buttons>
    </x-slot:buttons>


    @foreach ($books as $book)
        <div class="card card-side bg-base-100 shadow-xl flex gap-4 p-4 mb-[50px]">
            <!-- Book Cover -->
            <div class="w-[240px] h-[360px]">
                <a href="/book/{{ $book->id }}">
                    <img src="{{ $book->image_url ?? 'https://via.placeholder.com/240x360' }}" alt="{{ $book->title }}"
                        class="w-full h-full object-cover rounded-2xl cursor-pointer">
                </a>
            </div>

            <!-- Book Details -->
            <div class="flex flex-col justify-between flex-1">
                <!-- Title -->
                <h2 class="font-bold text-gray-800 dela-gothic-one-regular text-6xl">{{ $book->title }}</h2>

                <!-- Information -->
                <div class="space-y-4 text-left text-lg">
                    <p class="font-semibold">
                        <span class="block text-gray-900 text-xl">User:</span>
                        <span class="text-gray-600 font-normal">{{ $book->user->username ?? 'N/A' }}</span>
                    </p>
                    <p class="font-semibold">
                        <span class="block text-gray-900 text-xl">Borrowed at:</span>
                        <span class="text-gray-600 font-normal">{{ $book->borrowed_date ?? 'N/A' }}</span>
                    </p>
                    <p class="font-semibold">
                        <span class="block text-gray-900 text-xl">Due date:</span>
                        <span class="text-gray-600 font-normal">{{ $book->due_date ?? 'N/A' }}</span>
                    </p>
                </div>

                <!-- Return Button -->
                <form method="POST" action="/borrowed_books/{{ $book->id }}">
                    @csrf
                    @method('DELETE')
                    <button
                        class="w-[120px] h-[40px] mt-4 btn bg-indigo-600 hover:bg-indigo-500 text-white font-semibold shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 text-xl" type="submit">
                        Return
                    </button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $books->links() }}




</x-layout>
