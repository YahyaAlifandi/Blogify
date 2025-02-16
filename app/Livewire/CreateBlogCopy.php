<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Kategori;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Psy\CodeCleaner\AssignThisVariablePass;

class CreateBlog extends Component
{
    public $title, $content, $image_url, $id_kategori, $id_user, $tanggal;
    #[Layout('empty-layout')]
    public function render()
    {
        $kategori = Kategori::all();
        return view('livewire.create-blog', [
            'kategori' => $kategori,
        ]);
    }

    public function submit(){
        return dd("tet");
    }

    // protected $rules = [
    //     'image_url' => 'required|image|max:1024',
    //     'content' => 'required|string',
    // ];

    // public function create()
    // {
    //     $this->validate();
    //     $name = $this->image_url->getClientOriginalName();
    //     $path = $this->image_url->storeAs('images', $name, 'public');
    //     $data = [
    //         'title' => $this->title,
    //         'content' => $this->content,
    //         'image_url' => $path,
    //         'id_kategori' => $this->id_kategori,
    //         'id_user' => $this->id_user,
    //         'tanggal' => date(now()),
    //     ];
    //     Blog::create($data);
    //     $this->reset();
    //     return redirect('/publish-finish');
    //     $this->clear_form();
    // }
    public function clear_form()
    {
        $this->title = '';
        $this->content = '';
        $this->image_url = '';
        $this->id_kategori = '';
        $this->id_user = '';
        $this->tanggal = '';
    }
}
