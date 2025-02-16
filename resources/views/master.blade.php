<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            /* Untuk Internet Explorer */
            scrollbar-width: none;
            /* Untuk Firefox */
        }
    </style>
</head>

<body class="bg-gray-100">
    <nav>
        <div class="flex w-full justify-between items-center px-10 py-5">
            <h1 class="text-xl font-bold">Blogify</h1>
            <div class="dropdown dropdown-left dropdown-center flex justify-between items-center">
                <button class="ml-2 btn btn-sm bg-white"><i class="bi bi-list"></i></button>
                <div class="dropdown-content bg-white rounded-lg shadown p-5 w-36 flex flex-col text-center">
                    <ul class="flex flex-col justify-between items-start gap-2">
                        <a href="/" class="">
                            <li class="flex gap-2 items-center active:scale-95 duration-200">
                                <i class="bi bi-house-door-fill"></i>
                                <h1 class="text-sm">Home</h1>
                            </li>
                        </a>
                        <a href="/my-blog" class="">
                            <li class="flex gap-2 items-center active:scale-95 duration-200">
                                <i class="bi bi-journal"></i>
                                <h1 class="text-sm">My Blog</h1>
                            </li>
                        </a>
                        <a href="/profile" class="">
                            <li class="flex gap-2 items-center active:scale-95 duration-200">
                                <i class="bi bi-person-circle"></i>
                                <h1 class="text-sm">Profile</h1>
                            </li>
                        </a>
                        <a href="/setting" class="">
                            <li class="flex gap-2 items-center active:scale-95 duration-200">
                                <i class="bi bi-gear"></i>
                                <h1 class="text-sm">Settings</h1>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-lg px-10 mt-5">
        {{ $slot }}
    </div>
</body>

</html>
