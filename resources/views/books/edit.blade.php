<x-layout returnButton="/book/{{ $book['id'] }}" :default="true">
    <x-slot:header>Edit</x-slot:header>
    <x-slot:buttons>
    </x-slot:buttons>

    <form class="space-y-6" action="/books/edit/{{ $book['id'] }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title Input -->
        <div>
            <label for="title" class="block text-left text-lg font-medium text-gray-900">Title</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                    title
                </span>
                <input type="text" class="grow text-lg" placeholder="Title" id="title" name="title"
                    value="{{ old('title', $book['title'] ?? '') }}" required />
            </label>
            @error('title')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Author Input -->
        <div>
            <label for="author" class="block text-left text-lg font-medium text-gray-900">Author</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                </svg>
                <input type="text" class="grow text-lg" placeholder="Author" id="author" name="author"
                    value="{{ old('author', $book['author'] ?? '') }}" required />
            </label>
            @error('author')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Publication Year Input -->
        <div>
            <label for="publication_year" class="block text-left text-lg font-medium text-gray-900">Publication
                Year</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                    calendar_month
                </span>
                <input type="number" class="grow text-lg" placeholder="Year (1000-9999)" id="publication_year"
                    name="publication_year" min="1000" max="9999"
                    value="{{ old('publication_year', $book['publication_year'] ?? '') }}" required />
            </label>
            @error('publication_year')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category Select -->
        <div>
            <label for="category" class="block text-left text-lg font-medium text-gray-900 pb-2">Category</label>
            <div class="h-[300px] overflow-y-auto border border-gray-300 rounded-lg bg-white">
                @foreach ($categories as $category)
                    <div class="flex items-center group">
                        <!-- Hidden checkbox -->
                        <input type="checkbox" id="category_{{ $category->id }}" name="category[]"
                            value="{{ $category->id }}" class="peer hidden"
                            @if (in_array($category->id, $book->categories->pluck('id')->toArray())) checked @endif />
                        <label for="category_{{ $category->id }}"
                            class="p-4 block w-full py-2 cursor-pointer font-semibold bg-white group-hover:bg-gray-300 group-hover:text-white peer-checked:bg-gray-500 peer-checked:text-white">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('category')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- ISBN Input -->
        <div>
            <label for="isbn" class="block text-left text-lg font-medium text-gray-900">ISBN</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                    barcode
                </span>
                <input type="text" class="grow text-lg" placeholder="ISBN" id="isbn" name="isbn"
                    value="{{ old('isbn', $book['ISBN'] ?? '') }}" required />
            </label>
            @error('isbn')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image URL Input -->
        <div>
            <label for="image" class="block text-left text-lg font-medium text-gray-900">Image (URL)</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                    image
                </span>
                <input type="url" class="grow text-lg" placeholder="Image URL" id="image" name="image"
                    value="{{ old('image', $book['image_url'] ?? '') }}" required />
            </label>
            @error('image')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description Textarea -->
        <div>
            <label for="description" class="block text-left text-lg font-medium text-gray-900">Description</label>
            <textarea id="description" name="description"
                class="input input-bordered w-[100%] mt-2 text-lg h-[500px] p-[10px] px-[20px]" rows="4"
                placeholder="Enter a description of the book">{{ old('description', $book['description'] ?? '') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-[200px] btn text-white bg-indigo-600 hover:bg-indigo-500 px-6 py-2 text-lg font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Submit
            </button>
        </div>
    </form>



</x-layout>
