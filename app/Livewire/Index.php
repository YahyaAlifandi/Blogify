<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $id_blog;

    #[Layout('master')]
    public function render()
    {
        $blog = Blog::all();
        return view('livewire.index', [
            'blog' => $blog,
        ]);
    }

    public function test() {
        dd('apalah');
    }
}
