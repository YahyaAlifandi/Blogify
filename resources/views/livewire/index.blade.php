<div class="h-[86vh]">
    <div class="top gap-3 flex flex-col">
        <div class="title flex flex-row items-center gap-2">
            <h1 class="text-gray-600 font-bold text-2xl">Top Views</h1> <span
                class="badge bg-blue-500 text-white text-center text-[11px]">10</span>
        </div>
        <div class="card-list mt-5 w-full overflow-x-auto no-scrollbar flex flex-row justify-between items-center gap-5">
            <div class=" bg-white px-5 py-3 rounded-lg flex justify-center items-center gap-3 min-w-80">
                <img src="https://placehold.co/60x60" class="object-cover rounded-lg" alt="">
                <div class="content flex flex-col justify-center items-start">
                    <h1 class="font-medium">Title Blog</h1>
                    <p class="text-[12px] text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="articles gap-3 flex flex-col mt-10">
        <div class="title flex flex-row items-center gap-2">
            <h1 class="text-gray-600 font-bold text-2xl">Articles</h1> <span
                class="badge bg-blue-500 text-white text-center text-[11px]">10</span>
        </div>
        <div class="card-list mt-5 w-full overflow-x-auto no-scrollbar flex flex-row justify-start items-center gap-5">
            @foreach ($blog as $item)
                <button>
                    <div
                        class="bg-white rounded-lg flex flex-col p-5 max-w-56 min-w-56 max-h-72 justify-center items-start gap-4 border-2 border-gray-200">
                        <img src="{{ asset('storage/' . $item->image_url) }}"
                            class="object-cover rounded-lg w-full h-32 shadow">
                        <div class="content flex flex-col justify-between items-start">
                            <h1 class="block font-medium w-40 truncate overflow-hidden whitespace-nowrap">
                                {{ $item->title }}
                            </h1>
                            <h1 class="text-[13px] mt-1 text-gray-600">{{ $item->tanggal }}</h1>
                        </div>
                    </div>
                </button>
            @endforeach
        </div>
    </div>
    <button wire:click="test">Click Me!!!!</button>
</div>
