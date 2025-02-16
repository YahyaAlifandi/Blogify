<div class="p-10">
    {{-- {{ dd($comment_views) }} --}}
    <div class="header">
        <h1 class="badge bg-blue-600 text-[9px] text-white">{{ $data->kategori ?? 'Kategori Tidak Ditemukan' }}</h1>
        <h1 class="badge bg-gray-300 text-[9px] text-gray-500">
            <i class="bi bi-eye mr-1"></i> {{ $view }}
        </h1>
        <h1 class="badge bg-gray-300 text-[9px] text-gray-500">
            <i class="bi bi-chat-square mr-1"></i> {{ $total_comment }}
        </h1>
    </div>

    <div class="title">
        <h1 class="text-3xl font-bold mt-3 text-gray-700 max-w-2xl w-full">
            {{ $data->title ?? 'Judul Tidak Ditemukan' }}
        </h1>
    </div>

    <div class="content grid grid-cols-1 mt-5 gap-5 lg:grid-cols-4">
        <div class="col-span-3 bg-white rounded-lg p-5">
            <div class="header flex justify-between mb-5">
                <button wire:click="getIdProfile">
                    {{-- <img src="{{ asset('storage/'. $data->image_url) }}" alt=""> --}}
                    <h1 class="text-sm font-semibold">{{ $data->nama_user ?? 'Tidak Diketahui' }}</h1>
                </button>
                <h1 class="text-sm flex items-center justify-center gap-1">
                    <button wire:click="addlike">
                        @if ($status)
                            <i class="bi bi-heart"></i>
                        @else
                            <i class="bi bi-heart-fill text-rose-600"></i>
                        @endif
                    </button> {{ $like }}
                </h1>
            </div>
            <img src="{{ asset('storage/' . ($data->image_url ?? 'default.jpg')) }}" class="rounded-lg" alt="Gambar">
            <div class="mt-10">
                <div class="blog-content">
                    {!! $data->content ?? '<p>Konten tidak tersedia</p>' !!}
                </div>
            </div>
        </div>

        <div class="col-span-3 lg:col-span-1 bg-white rounded-lg p-5">
            <div class="header flex justify-between mb-5">
                <div class="flex gap-2 items-center">
                    <h1 class="text-sm font-semibold">Comment</h1>
                    <h1 class="text-sm badge bg-gray-100">{{ $total_comment }}</h1>
                </div>
                <button onclick="addcomment.showModal()"
                    class="bg-blue-500 text-white rounded-md flex justify-center items-center text-[10px] px-2 py-1">
                    <i class="bi bi-plus-circle"></i>
                </button>
            </div>

            <div class="content">
                @foreach ($comment_views as $item)
                    <div class="content-comment">
                        <div class="comment flex flex-col gap-1 bg-base-200 p-3 rounded-lg my-2">
                            <div class="flex items-center gap-2 mb-2">
                                <img src="{{ asset('storage/' . trim($item->image_profile ?? 'images/default.jpg', '"')) }}"
                                    class="rounded-full size-7 border border-gray-200" alt="Gambar">
                                <h1 class="font-semibold text-[12px]">{{ $item->nama_user }} </h1>
                            </div>
                            <p class="text-[11px]">{{ $item->comment }}</p>
                            <button onclick="add_comment_reply.showModal()"
                                wire:click="ReplyCommentId({{ $item->id_comment }})"
                                class="btn btn-sm text-sm bg-base-300"><i class="bi bi-reply-fill"></i>Reply</button>
                            @if (isset($count_reply[$item->id_comment]))
                            <button class="btn btn-sm text-sm bg-base-300 toggle-reply"
                                data-id="{{ $item->id_comment }}">
                                <span id="iconmata_{{ $item->id_comment }}"><i class="bi bi-eye-fill"></i></span>
                                    <span id="textShow_{{ $item->id_comment }}">Show Reply</span>
                                    <div class="badge size-5 bg-blue-500 text-white text-[10px]">
                                        {{ $count_reply[$item->id_comment] ?? 0 }}</div>
                            </button>
                            @endif
                        </div>

                        <div id="reply_comment_{{ $item->id_comment }}" class="hidden">
                            @if (isset($Reply_comment[$item->id_comment]))
                                @foreach ($Reply_comment[$item->id_comment] as $reply)
                                    <div class="reply bg-gray-100 p-2 rounded-lg ml-5 flex flex-col mb-2">
                                        <div class="flex justify-start items-center">
                                            <img src="{{ asset('storage/' . trim($reply->image_replay_users ?? 'images/default.jpg', '"')) }}"
                                            class="rounded-full size-4 border border-gray-200" alt="Gambar">
                                            <h1 class="text-[11px] font-semibold">{{ $reply->nama_reply_users }}</h1>
                                        </div>
                                        <p class="text-[11px]">{{ $reply->replay_comment }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <dialog id="addcomment" class="modal">
        <div class="modal-box w-full">
            <h1 class="text-lg font-bold text-gray-600 mb-5">Add Comment</h1>
            <input type="text" wire:model="comment"
                class="text-sm bg-base-200 border-none outline-none flex px-5 py-3 w-full rounded-lg text-gray-600"
                placeholder="Masukan Komentar">
            <div class="modal-action flex justify-between">
                <form action="" method="dialog">
                    <button class="btn btn-sm bg-rose-600 rounded-md text-white" wire:click="clear_form">Close</button>
                </form>
                <button wire:click="addComment" class="btn btn-sm bg-blue-600 rounded-md text-white">Kirim</button>
            </div>
        </div>
    </dialog>
    <dialog id="add_comment_reply" class="modal" wire:ignore>
        <div class="modal-box w-full">
            <h1 class="text-lg font-bold text-gray-600 mb-5">Add Reply Comment</h1>
            <input type="text" wire:model="reply_comment"
                class="text-sm bg-base-200 border-none outline-none flex px-5 py-3 w-full rounded-lg text-gray-600"
                placeholder="Masukan Komentar">
            <div class="modal-action flex justify-between">
                <form action="" method="dialog">
                    <button class="btn btn-sm bg-rose-600 rounded-md text-white" wire:click="clear_form">Close</button>
                </form>
                <button wire:click="addReplyComment" class="btn btn-sm bg-blue-600 rounded-md text-white">Kirim</button>
            </div>
        </div>
    </dialog>
    <script>
        document.querySelectorAll('.toggle-reply').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-id');
                const replyDiv = document.getElementById(`reply_comment_${commentId}`);
                const iconMata = document.getElementById(`iconmata_${commentId}`);
                const spanId = document.getElementById(`textShow_${commentId}`)

                if (replyDiv.classList.contains('hidden')) {
                    replyDiv.classList.remove('hidden');
                    spanId.innerHTML = 'Hide Reply';
                    iconMata.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
                } else {
                    replyDiv.classList.add('hidden');
                    spanId.innerHTML = 'Show Reply';
                    iconMata.innerHTML = '<i class="bi bi-eye-fill"></i>';
                }
            });
        });
    </script>
</div>
