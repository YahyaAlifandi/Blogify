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
    <form action="/registrasi-blog/action" method="POST">
        @csrf
        <div class="p-10 flex flex-col justify-between items-center h-screen">
            <div class="title text-center">
                <h1 class="font-bold text-blue-600 text-3xl">Welcome to Blogify</h1>
                <p class="text-sm text-gray-500 mt-1">Bagikan cerita anda ke orang lain, buat mereka tau akan anda</p>
            </div>
            <div class="form w-[30rem]">
                <div class="flex flex-col w-full">
                    <label for="" class="text-sm">Nama</label>
                    <input type="Nama" name="nama" class="bg-white rounded-lg text-gray-600 px-5 py-3 mt-1 text-sm outline-gray-400 border border-gray-200"
                        placeholder="Masukan Nama">
                </div>
                <div class="flex flex-col w-full mt-2">
                    <label for="" class="text-sm">Email</label>
                    <input type="email" name="email" class="bg-white rounded-lg text-gray-600 px-5 py-3 mt-1 text-sm outline-gray-400 border border-gray-200"
                        placeholder="Masukan Email">
                </div>
                <div class="flex flex-col w-full mt-2">
                    <label for="" class="text-sm">Password</label>
                    <input type="Password" name="password" class="bg-white rounded-lg text-gray-600 px-5 py-3 mt-1 text-sm outline-gray-400 border border-gray-200"
                        placeholder="Masukan Password">
                </div>
            </div>
            <div class="button w-[30rem] text-center">
                <p class="text-sm mb-1">Sudah Punya Akun? <a href="/login-blog" class="underline text-blue-500">Masuk</a></p>
                <button type="submit" class="w-full bg-blue-600 rounded-lg text-white px-5 py-3 font-semibold">Registrasi</button>
            </div>
        </div>
    </form>
</body>
</html>
