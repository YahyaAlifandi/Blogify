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
    <div class="container w-full h-screen items-center justify-center flex">
        <div class="bg-white rounded-lg p-5 text-center">
            <div class="flex flex-col justify-center items-center mb-5">
                <h1 class="text-xl font-bold text-gray-600">Login Gagal</h1>
                <h1 class="text-sm text-gray-600">Harap coba lagi</h1>
            </div>
            <a href="/login-blog" class="btn btn-sm bg-rose-500 text-white rounded-lg text-sm">Login Ulang</a>
        </div>
    </div>
</body>

</html>
