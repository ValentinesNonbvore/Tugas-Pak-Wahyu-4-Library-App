@php
    use Illuminate\Support\Facades\Auth as FacadesAuth;
    $userData = FacadesAuth::user();
@endphp

<x-layout returnButton="">
    <x-slot:header>Discover</x-slot:header>
    <x-slot:buttons>
        @if ($userData && $userData['role_id'] != 3)
            <button class="btn btn-info btn-lg">
                <a href="/books/create" class="flex items-center space-x-2">
                    <span class="material-symbols-outlined text-[35px] font-extrabold text-white">add</span>
                </a>
            </button>
        @endif
    </x-slot:buttons>

    <div class="grid grid-cols-5  gap-10 mb-10">

        @foreach ($books as $book)
        <div class="rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.2)] relative aspect-h-4 aspect-w-3 max-h-[450px] max-w-[300px]">
            <a href="/book/{{ $book['id'] }}" class="flex overflow-y-hidden justify-center w-full h-full">
                <img src="{{ $book['image_url'] ?? 'https://via.placeholder.com/120x180' }}"
                     alt="Book"
                     class="w-full overflow-y-hidden object-cover rounded-2xl cursor-pointer"
                     loading="eager">
            </a>

            @if ($userData && $userData['role_id'] != 3)
                <div class="absolute bottom-[10px] right-[10px] left-[10px] flex items-center justify-evenly gap-[10px]">
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
                </div>
            @endif
        </div>
        @endforeach
    </div>


    {{ $books->links() }}



</x-layout>
