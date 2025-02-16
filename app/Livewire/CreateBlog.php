<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Kategori;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBlog extends Component
{
    use WithFileUploads;

    public $title, $content, $image_url, $id_kategori, $id_user, $tanggal;

    protected $rules = [
        'image_url' => 'required|image|max:1024',
        'content' => 'required|string',
        'tanggal' => 'required|date|dmy',
    ];

    #[Layout('empty-layout')]
    public function render()
    {
        $kategori = Kategori::all();
        return view('livewire.create-blog', [
            'kategori' => $kategori,
        ]);
    }

    public function create()
    {
        $name = $this->image_url->getClientOriginalName();
        $path = $this->image_url->storeAs('images', $name, 'public');
        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'image_url' => $path,
            'id_kategori' => $this->id_kategori,
            'id_user' => auth()->user()->id_users,
            'tanggal' => date('dmy'),
        ];
        Blog::create($data);
        $this->reset();
        return redirect('/publish-finish');
        $this->clear_form();
    }

    public function clear_form()
    {
        $this->title = '';
        $this->content = '';
        $this->image_url = '';
        $this->id_kategori = '';
        $this->id_user = '';
        $this->tanggal = '';
    }

    public function test()
    {
        dd('test');
    }
}
