<x-layout returnButton="/categories">
    <x-slot:header>Create</x-slot:header>
    <x-slot:buttons>
    </x-slot:buttons>

    <form class="space-y-6" action="/categories/create" method="POST">
        @csrf
        <!-- Name Input -->
        <div>
            <label for="name" class="block text-left text-lg font-medium text-gray-900">Name</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg"> tag </span>
                <input type="text" class="grow text-lg" placeholder="Category Name" id="name" name="name" required />
            </label>
            <!-- Error Display for Name -->
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-[200px] btn text-white bg-indigo-600 hover:bg-indigo-500 px-6 py-2 text-lg font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create
            </button>
        </div>
    </form>




</x-layout>
