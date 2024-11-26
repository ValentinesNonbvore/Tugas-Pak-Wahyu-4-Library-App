<x-guest.layout :verticalCenter="false">

    <div class="flex flex-col w-[100%]">
        <div class="w-full">
            <h2 class="mt-10 text-left text-4xl font-semibold tracking-tight text-gray-900 dela-gothic-one-regular">Log in to your account</h2>
        </div>

        <div class="mt-5 w-full">
            <form class="space-y-6" action="/login" method="POST">
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

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-left text-lg font-medium text-gray-900">Email address</label>
                    <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="text" class="grow text-lg" placeholder="Email" id="email" name="email" autocomplete="email" required />
                    </label>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-left text-lg font-medium text-gray-900">Password</label>
                    <label class="input input-bordered flex items-center gap-2 w-[100%] mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                        </svg>
                        <input type="password" class="grow text-lg" id="password" name="password" autocomplete="current-password" placeholder="Password" required />
                    </label>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Log In Button -->
                <div>
                    <button type="submit" class="w-[200px] btn text-white bg-indigo-600 hover:bg-indigo-500 px-6 py-2 text-lg font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Log in
                    </button>
                </div>

                <!-- Login Error Below Button -->
                @error('login')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </form>



            <p class="mt-6 text-left text-lg text-gray-500">
                Not a member?
                <a href="/signup" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign up here!</a>
            </p>
        </div>

    </div>

</x-guest.layout>
