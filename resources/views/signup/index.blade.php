<x-guest.layout :verticalCenter="false">

    <div class="flex flex-col w-[100%]">
        <div class="w-full">
            <h2 class="mt-10 text-left text-4xl font-semibold tracking-tight text-gray-900 dela-gothic-one-regular">Sign up an account</h2>
        </div>

        <div class="mt-5 w-full">
            <form class="space-y-6" action="/signup" method="POST">
                @csrf
                <!-- Username Input -->
                <div>
                    <label for="username" class="block text-left text-lg font-medium text-gray-900">Username</label>
                    <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                        <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                            person
                        </span>
                        <input type="text" class="grow text-lg" placeholder="Username" id="username" name="username" required />
                    </label>
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Full Name Input -->
                <div>
                    <label for="full_name" class="block text-left text-lg font-medium text-gray-900">Full Name</label>
                    <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                        <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                            person_outline
                        </span>
                        <input type="text" class="grow text-lg" placeholder="Full Name" id="full_name" name="full_name" required />
                    </label>
                    @error('full_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number Input -->
                <div>
                    <label for="phone_number" class="block text-left text-lg font-medium text-gray-900">Phone Number</label>
                    <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                        <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                            phone
                        </span>
                        <input type="tel" class="grow text-lg" placeholder="Phone Number" id="phone_number" name="phone_number" />
                    </label>
                    @error('phone_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gmail Input -->
                <div>
                    <label for="email" class="block text-left text-lg font-medium text-gray-900">Email</label>
                    <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                        <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                            mail
                        </span>
                        <input type="email" class="grow text-lg" placeholder="Email Address" id="email" name="email" required />
                    </label>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-left text-lg font-medium text-gray-900">Password</label>
                    <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                        <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                            lock
                        </span>
                        <input type="password" class="grow text-lg" placeholder="Password" id="password" name="password" required />
                    </label>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-left text-lg font-medium text-gray-900">Confirm Password</label>
                    <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                        <span class="material-symbols-outlined text-gray-600 font-extrabold ml-[-2px] text-lg">
                            lock
                        </span>
                        <input type="password" class="grow text-lg" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required />
                    </label>
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-[200px] btn text-white bg-indigo-600 hover:bg-indigo-500 px-6 py-2 text-lg font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create User
                    </button>
                </div>
            </form>



            <p class="mt-6 text-left text-lg text-gray-500">
                Already a member?
                <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Log in here!</a>
            </p>
        </div>



    </div>

</x-guest.layout>
