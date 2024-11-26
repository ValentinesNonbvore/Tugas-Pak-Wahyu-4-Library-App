<x-layout returnButton="">
    <x-slot:header>Categories</x-slot:header>
    <x-slot:buttons>
        <button class="btn btn-info btn-lg">
            <a href="/categories/create" class="flex items-center space-x-2">
                <span class="material-symbols-outlined text-[35px] font-extrabold text-white">add</span>
            </a>
        </button>
    </x-slot:buttons>

    <div class="space-y-4 w-full mx-auto mb-12">
        @foreach ($categories as $category)
            <div class="flex items-center justify-between bg-gray-100 rounded-lg shadow-xl p-4 w-full">
                <div class="flex items-center">
                    <span class="material-symbols-outlined text-gray-600 mr-2">tag</span>
                    <span class="text-lg font-semibold text-gray-900">{{ $category->name }}</span>
                </div>
                <form action="/categories/delete/{{$category->id}}" method="POST"
                    class="flex items-center space-x-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error px-4 py-2">
                        <span class="material-symbols-outlined text-white font-extrabold text-2xl">delete</span>
                    </button>
                </form>
            </div>
        @endforeach
    </div>

    {{ $categories->links() }}









</x-layout>
