<x-layout returnButton="">
    <x-slot:header>Users</x-slot:header>
    <x-slot:buttons>
        <button class="btn btn-info btn-lg">
            <a href="/users/create" class="flex items-center space-x-2">
                <span class="material-symbols-outlined text-[35px] font-extrabold text-white">add</span>
            </a>
        </button>
    </x-slot:buttons>

    <div class="grid grid-cols-5 gap-6 p-4 mb-4">
        @foreach ($users as $user)
            <div>
                <!-- Profile Card -->
                <div class="card bg-base-100 w-[300px] shadow-xl">
                    <!-- Image Section -->
                    <div class="w-full h-[300px] bg-gray-300 rounded-tl-lg rounded-tr-lg">
                        <img src="https://via.placeholder.com/300x300.png?text=No+Profile+Picture"
                            alt="Profile Picture of {{ $user->username }}"
                            class="w-full h-full object-cover rounded-tl-lg rounded-tr-lg">
                    </div>

                    <!-- Content Section -->
                    <div class="p-4 space-y-4 text-center">
                        <!-- Name -->
                        <h2 class="text-xl font-semibold text-gray-800 cursor-default">{{ $user->username }}</h2>

                        <!-- Buttons -->
                        <div class="flex items-center justify-evenly gap-4">
                            <button class="btn btn-info w-1/2">
                                <a href="/user/edit/{{ $user->id }}" class="flex items-center space-x-2">
                                    <span class="material-symbols-outlined text-3xl font-bold text-white">edit</span>
                                </a>
                            </button>
                            <form action="/user/delete/{{ $user->id }}" method="POST" class="w-1/2"
                                onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error w-full">
                                    <span class="material-symbols-outlined text-3xl font-bold text-white">delete</span>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $users->links() }}





</x-layout>
