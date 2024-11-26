<nav class="fixed top-0 bottom-0 left-0 w-[150px] bg-indigo-600 flex flex-col p-[50px] z-50">
    <!-- First Div -->
    <div class="flex-1 flex flex-col justify-start items-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/Bontang_City_Vector_Logo.svg" class="w-[50px]">
    </div>

    <!-- Second Div -->
    <div class="flex flex-col items-center justify-center text-[50px] gap-12">
        <a href="/" class="flex items-center space-x-2"><span
                class="material-symbols-outlined text-[35px] font-extrabold text-white">book_2</span>
        </a>
        <a href="/borrowed_books" class="flex items-center space-x-2"><span
                class="material-symbols-outlined text-[35px] font-extrabold text-white">inbox</span>
        </a>

        @php

            use Illuminate\Support\Facades\Auth as FacadesAuth;
            $userData = FacadesAuth::user();

            if ($userData === null) {
                $userData = false;
            }

        @endphp

        @if ($userData && $userData['role_id'] === 2)
            <a href="/categories" class="flex items-center space-x-2"><span
                    class="material-symbols-outlined text-[35px] font-extrabold text-white">grid_view</span>
            </a>
        @elseif ($userData && $userData['role_id'] === 1)
            <a href="/users" class="flex items-center space-x-2"><span
                    class="material-symbols-outlined text-[35px] font-extrabold text-white">person</span>
            </a>
            <a href="/categories" class="flex items-center space-x-2"><span
                    class="material-symbols-outlined text-[35px] font-extrabold text-white">grid_view</span>
            </a>
        @endif

    </div>

    <!-- Third Div -->
    <div class="flex-1 flex flex-col justify-end items-center text-[50px]">
        <form action="/logout" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="">
                <a href="/logout" class="flex items-center space-x-2"><span
                        class="material-symbols-outlined text-[40px] font-extrabold text-white">
                        logout
                    </span>
                </a>
            </button>
        </form>


    </div>
</nav>
