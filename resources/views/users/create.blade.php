<x-layout returnButton="/users">
    <x-slot:header>Create</x-slot:header>
    <x-slot:buttons>
    </x-slot:buttons>

    <form class="space-y-6" action="/users/create" method="POST">
        @csrf <!-- Include CSRF Token for form submission -->

        <!-- Username Input -->
        <div>
            <label for="username" class="block text-left text-lg font-medium text-gray-900">Username</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg"> person </span>
                <input type="text" class="grow text-lg" placeholder="Username" id="username" name="username" required />
            </label>
            <!-- Error Display for Username -->
            @error('username')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Full Name Input -->
        <div>
            <label for="full_name" class="block text-left text-lg font-medium text-gray-900">Full Name</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg"> person_outline </span>
                <input type="text" class="grow text-lg" placeholder="Full Name" id="full_name" name="full_name" required />
            </label>
            <!-- Error Display for Full Name -->
            @error('full_name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Phone Number Input -->
        <div>
            <label for="phone_number" class="block text-left text-lg font-medium text-gray-900">Phone Number</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg"> phone </span>
                <input type="tel" class="grow text-lg" placeholder="Phone Number" id="phone_number" name="phone_number" />
            </label>
            <!-- Error Display for Phone Number -->
            @error('phone_number')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gmail Input -->
        <div>
            <label for="email" class="block text-left text-lg font-medium text-gray-900">Gmail</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg"> mail </span>
                <input type="email" class="grow text-lg" placeholder="Gmail Address" id="email" name="email" required />
            </label>
            <!-- Error Display for Gmail -->
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Input -->
        <div>
            <label for="password" class="block text-left text-lg font-medium text-gray-900">Password</label>
            <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg"> lock </span>
                <input type="password" class="grow text-lg" placeholder="Password" id="password" name="password" required />
            </label>
            <!-- Error Display for Password -->
            @error('password')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Role Select -->
        <div>
            <label for="role" class="block text-left text-lg font-medium text-gray-900">Role</label>
            <select id="role" name="role" class="input input-bordered w-[100%] mt-2 text-lg">
                <option value="" disabled selected>Select a role</option>
                <option value="1">Admin</option>
                <option value="2">Staff</option>
                <option value="3">User</option>
            </select>
            <!-- Error Display for Role -->
            @error('role')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Create User Button -->
        <div>
            <button type="submit" class="w-[200px] btn text-white bg-indigo-600 hover:bg-indigo-500 px-6 py-2 text-lg font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create User
            </button>
        </div>
    </form>




</x-layout>
