@props([
    'returnButton' => false,
    'default' => true,
])

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Perpustakaan</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/6/6b/Bontang_City_Vector_Logo.svg"
        type="image/png" sizes="192x192">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Dela+Gothic+One&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 1,
                'wght' 700,
                'GRAD' 0,
                'opsz' 24
        }

        .dela-gothic-one-regular {
            font-family: "Dela Gothic One", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        *::selection {
            background: #FFD700;
            color: #000;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900 min-h-full ml-[150px]">
    <div id="app" class="flex flex-col min-h-screen">

        <!-- Nav bar -->
        <x-navbar></x-navbar>

        <!-- background -->
        <div class="absolute top-0 right-0 left-[150px] h-[60vh]"
            style="background: linear-gradient(90deg, #e9e5d9 65%, #dad4be 65%); z-index: 0; border-radius: 0 0 0 200px;">
        </div>

        @if ($default)
            <!-- Content Div -->
            <div class="relative p-[150px] pt-[300px] flex-1">

                @if ($returnButton)
                    <a class="absolute top-[150px] left-[150px] text-[30px] cursor-pointer" href="{{ $returnButton }}">
                        <span class="material-symbols-outlined text-[20px]">arrow_back_ios</span>Go back
                    </a>
                @endif

                <x-header>
                    <x-slot:header>{{ $header }}</x-slot:header>
                    <x-slot:buttons>{{ $buttons }}</x-slot:buttons>
                </x-header>

                <div>
                    {{ $slot }}
                </div>
            </div>
        @else
            <div class="relative p-[150px] flex-1">

                @if ($returnButton)
                    <a class="absolute top-[150px] left-[150px] text-[30px] cursor-pointer" href="{{ $returnButton }}">
                        <span class="material-symbols-outlined text-[20px]">arrow_back_ios</span>Go back
                    </a>
                @endif

                {{ $slot }}
            </div>
        @endif

        <!-- footer -->
        <x-footer class="mt-auto"></x-footer>


    </div>
</body>



</html>
