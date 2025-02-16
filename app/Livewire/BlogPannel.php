<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BlogPannel extends Component
{
    #[Layout('empty-layout')]
    public function render()
    {
        $blog_data = Blog::select([
            'blog.id_blog',
            'blog.title',
            'blog.image_url',
            'blog.content',
            'blog.id_kategori',
            'blog.id_user',
            'blog.tanggal',
            'users.nama',
            'kategori.kategori',
        ])
        ->leftjoin('users', 'blog.id_user', '=', 'users.id_users')
        ->leftjoin('kategori', 'blog.id_kategori', '=', 'kategori.id_kategori')
        ->get();
        $no = 1;
        return view('livewire.blog-pannel', [
            'blog_data' => $blog_data,
            'no' => $no,
        ]);
    }
    public function delete($id) {
        $data = Blog::findOrFail($id);
        $data->delete();
    }
    public function view($id) {
        session()->put('id_blog', $id);
        return redirect('/view-blog');
    }
}
