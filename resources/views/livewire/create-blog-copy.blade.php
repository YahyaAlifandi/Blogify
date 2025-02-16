<style>
    .ql-toolbar {
        background-color: '#fffff';
        border-radius: 8px;
    }

    .ql-editor {
        min-height: 200px;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<div class="flex justify-start items-center flex-col p-10">
    <div class="title">
        <h1 class="font-bold text-gray-700 text-xl">Buat Blog Anda</h1>
    </div>
    <div class="content form-control mt-5 flex w-full">
        <div class="flex flex-col w-full">
            <label for="" class="text-sm">Judul</label>
            <input type="text" wire:model='title'
                class="bg-white rounded-lg text-gray-600 px-5 py-3 mt-1 text-sm outline-gray-400 border border-gray-200"
                placeholder="Masukan Judul">
        </div>
        <div class="flex flex-col w-full mt-2">
            <label for="" class="text-sm">Image</label>
            <select name="" id="" wire:model='id_kategori'
                class="bg-white rounded-lg text-gray-600 px-5 py-3 mt-1 text-sm outline-gray-400 border border-gray-200">
                <option value="" selected>Pilih Kategori</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id_kategori }}">{{ $item->kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col w-full mt-2">
            <label for="" class="text-sm">Image</label>
            <input type="file" wire:model='image_url'
                class="bg-white rounded-lg text-gray-600 px-5 py-3 mt-1 text-sm border border-gray-200"
                placeholder="Masukan Imgage">
        </div>
        <div class="flex flex-col w-full mt-2">
            <label for="" class="text-sm mb-3">Blog</label>
            <div type="text" wire:model='content' id="editor" wire:ignore
                class="bg-white rounded-lg mt-1 text-sm border border-gray-200 " placeholder="Masukan Cerita Anda">
            </div>
        </div>
        <div class="button mt-10 flex justify-between">
            <button class="btn btn-sm bg-rose-500 rounded-lg shadow-sm text-white px-5">
                <div class="flex flex-row justify-center items-center gap-2">
                    <i class="bi bi-x-circle"></i>
                    <h1>Cancel</h1>
                </div>
            </button>
            <button type="button" class="btn btn-sm bg-blue-500 rounded-lg shadow-sm text-white px-5" wire:click="submit">
                <div class="flex flex-row justify-center items-center gap-2">
                    <i class="bi bi-send"></i>
                    <h1>Publish Blog</h1>
                </div>
            </button>

            <button wire:click="submit">
                Test
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{
                            'header': 1
                        }, {
                            'header': 2
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'align': []
                        }],
                    ]
                }
            });
            quill.on('text-change', function() {
                @this.set('content', quill.root.innerHTML);
            });
        });
    </script>
</div>
