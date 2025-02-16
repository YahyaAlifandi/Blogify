<div class="h-screen w-full justify-center items-center flex">
    <div class="bg-white rounded-lg shadow-md p-5 min-w-[20rem] max-w-min flex flex-col justify-center items-center gap-5">
        <img src="{{ asset('storage/'. (trim($user->image_profile, '"') ?? 'images/default.jpg')) }} "alt="" class="size-24 rounded-full border-2 border-gray-200 shadow">
        <div class="text-center">
            <h1 class="text-lg font-semibold">{{ $user->nama }}</h1>
            <p class="text-sm font-light">{{ $user->email }}</p>
        </div>
        <div class="flex justify-between w-full items-center px-10">
            <div class="flex flex-col gap-0 justify-center items-center">
                <h1 class="text-xl font-semibold text-gray-600">{{ $data_count }}</h1>
                <p class="text-[11px] text-gray-600 -mt-1">Post</p>
            </div>
            <div class="flex flex-col gap-0 justify-center items-center">
                <h1 class="text-xl font-semibold text-gray-600">{{ $total_views ?? 0 }}</h1>
                <p class="text-[11px] text-gray-600 -mt-1">Views</p>
            </div>
            <div class="flex flex-col gap-0 justify-center items-center">
                <h1 class="text-xl font-semibold text-gray-600">{{ $total_likes ?? 0 }}</h1>
                <p class="text-[11px] text-gray-600 -mt-1">Likes</p>
            </div>
        </div>
        <p class="text-[10px] font-light text-gray-600">Dibuat pada {{ Auth::user()->created_at }}</p>
        <button class="btn btn-sm bg-blue-500 flex w-full text-white shadow -mt-3" wire:click="kembali">Kembali</button>
    </div>
</div>
