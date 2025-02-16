<div class="h-[87vh] w-full justify-center items-center flex">
    <div
        class="bg-white rounded-lg shadow-md p-5 min-w-[20rem] max-w-min flex flex-col justify-center items-center gap-5">
        <img src="{{ asset('storage/' . (trim(Auth::user()->image_profile ?? 'images/default.jpg', '"'))) }} "alt=""
            class="size-24 rounded-full border-2 border-gray-200 shadow">
        <div class="text-center">
            <h1 class="text-lg font-semibold">{{ Auth::user()->nama }}</h1>
            <p class="text-sm font-light">{{ Auth::user()->email }}</p>
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
        <button class="btn btn-sm bg-blue-500 flex w-full text-white shadow -mt-3"
            wire:click="getIdProfile({{ Auth::user()->id_users }})" onclick="EditProfile.showModal()">Edit
            Profile</button>
    </div>
    <dialog id="EditProfile" wire:ignore class="modal">
        <div class="modal-box">
            <h1 class="font-semibold">Edit Profile</h1>
            <p class="text-sm text-gray-400">Edit Your Profile</p>
            <div class="content my-5">
                <label for="" class="text-sm text-gray-500">Edit Nama</label>
                <input type="text" wire:model="nama"
                    class="bg-base-200 outline-none px-5 py-2 rounded-lg flex w-full text-sm text-gray-600">
                <div class="mt-3">
                    <label for="" class="text-sm text-gray-500">Edit Your Image</label>
                    <input type="file" wire:model="image_profile" required
                        class="bg-base-200 outline-none px-5 py-2 rounded-lg flex w-full text-sm text-gray-600">
                </div>
            </div>
            <div class="modal-action">
                <form action="" method="dialog" class="w-full">
                    <div class="flex justify-between items-center">
                        <button wire:click="update" class="btn btn-sm bg-blue-600 shadow text-white">Update</button>
                        <button class="btn btn-sm bg-rose-600 shadow text-white">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>
</div>
