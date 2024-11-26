@props([
    'verticalCenter' => true,
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

<body class="min-h-[100vh] bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1685248307090-7398826be120?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bmF0dXJlJTIwYWVzdGhldGljfGVufDB8fDB8fHww');">

    <div id="app" class="flex h-[100%]">

        <!-- Left Section -->
        <div class="w-2/5 bg-white h-[100%] pb-[50px] min-h-screen">
            <header class="px-6 pt-12 lg:px-8">
                <nav class="flex items-center justify-between" aria-label="Global">
                    <div class="flex lg:flex-1">
                        <a href="#" class="-m-1.5 p-1.5 flex items-center cursor-default">
                            <span class="sr-only">Your Company</span>
                            <img class="h-14 w-auto"
                                src="https://upload.wikimedia.org/wikipedia/commons/6/6b/Bontang_City_Vector_Logo.svg"
                                alt="">
                            <h1 class="ml-5 text-3xl font-semibold dela-gothic-one-regular">Dinas
                                Perpustakaan<br>dan Kearsipan Bontang</h1>
                        </a>
                    </div>
                </nav>
            </header>

            <div class="relative px-12 lg:px-8 h-full flex items-center justify-center">
                {{ $slot }}
            </div>
        </div>

        <!-- Right Section -->
        <div class="w-3/5 h-[100%]">
            <!-- Removed the image since it's now handled by the body background -->
        </div>

    </div>

    <!-- Include Vite-generated JS -->
    @vite('resources/js/app.js')

</body>





</html>
