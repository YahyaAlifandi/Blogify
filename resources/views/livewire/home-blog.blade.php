<div class="h-[86vh]">
    <div class="top gap-3 flex flex-col">
        <div class="title flex flex-row items-center gap-2">
            <h1 class="text-gray-600 font-bold text-2xl">Top Views</h1> <span
                class="badge bg-blue-500 text-white text-center text-[11px]">{{ $count_top_views }}</span>
        </div>
        <div class="card-list mt-5 w-full overflow-x-auto no-scrollbar flex flex-row justify-between items-center gap-5">
            @foreach ($top_views as $item)
                <button wire:click="viewBlog({{ $item->id_blog }})">
                    <div class=" bg-white px-5 py-3 rounded-lg flex justify-start items-center gap-3 min-w-80">
                        <img src="{{ asset('storage/' . $item->image_url) }}"
                            class="object-cover rounded-lg max-w-24 max-h-10" alt="">
                        <div class="content flex flex-col justify-center items-start">
                            <h1 class="font-medium">{{ $item->title }}</h1>
                        </div>
                    </div>
                </button>
            @endforeach
        </div>
    </div>
    <div class="articles gap-3 flex flex-col mt-10">
        <div class="flex w-full justify-between md:flex-row flex-col">
            <div class="title flex flex-row items-center gap-2">
                <h1 class="text-gray-600 font-bold text-2xl">Articles</h1> <span
                    class="badge bg-blue-500 text-white text-center text-[11px]">{{ $count_blog }}</span>
            </div>
            <input type="text" id="search-Input"
                    class="bg-white outline-none px-5 py-2 rounded-md text-sm text-gray-600 md:w-[40rem] w-[18rem]" placeholder="Masukan Query Search">
        </div>
        <div class="card-list mt-5 w-full overflow-x-auto no-scrollbar flex flex-row justify-start items-center gap-5">
            @foreach ($data as $item)
                <button wire:click="viewBlog({{ $item->id_blog }})">
                    <div data-card="{{ $item->title }}"
                        class="bg-white rounded-lg flex flex-col p-5 max-w-56 min-w-56 max-h-72 justify-center items-start gap-4 border-2 border-gray-200 content-card-item">
                        <img src="{{ asset('storage/' . $item->image_url) }}"
                            class="object-cover rounded-lg w-full h-32 shadow">
                        <div class="content flex flex-col justify-between items-center w-full">
                            <h1 class="font-medium w-40 truncate overflow-hidden whitespace-nowrap">
                                {{ $item->title }}
                            </h1>
                            <h1 class="text-[13px] mt-1 text-gray-600">{{ $item->tanggal }}</h1>
                        </div>
                        <div class="flex justify-between w-full items-center">
                            <div class=""><i
                                    class="bi bi-heart-fill text-rose-600 mr-1 "></i>{{ $item->total_like }}</div>
                            <div class="flex gap-2 items-center">
                                <h1 class="badge bg-gray-200 text-[9px] text-gray-500"><i class="bi bi-eye mr-1"></i>
                                    {{ $item->total_views }} </h1>
                                <h1 class="badge bg-gray-200 text-[9px] text-gray-500"><i
                                        class="bi bi-chat-square mr-1"></i> {{ $item->total_comment }} </h1>
                            </div>
                        </div>
                    </div>
                </button>
            @endforeach
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('search-Input').addEventListener('input', function() {
                let query = this.value.toLowerCase();
                let cards = document.querySelectorAll('.content-card-item');

                cards.forEach(card => {
                    let title = card.getAttribute('data-card');
                    if (title) {
                        title = title.toLowerCase();
                        if (!title.includes(query)) {
                            card.classList.add('hidden');
                        } else {
                            card.classList.remove('hidden');
                        }
                    }
                });
            });
        });
    </script>
</div>
