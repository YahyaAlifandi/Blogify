<?php

namespace App\Livewire;

use App\Models\Kategori;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PostBlog extends Component
{
    #[Layout('empty-layout')]
    public function render()
    {
        $kategori = Kategori::all();
        return view('livewire.post-blog', [
            'kategori' => $kategori,
        ]);
    }
}
