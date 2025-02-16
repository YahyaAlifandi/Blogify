<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Like;
use App\Models\View;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class HomeBlog extends Component
{
    public $id_blog;

    #[Layout('master')]
    public function render()
    {
        $data = Blog::select([
            'blog.id_blog',
            'blog.id_user',
            'blog.tanggal',
            'blog.title',
            'blog.content',
            'blog.image_url',
            'kategori.kategori',
            'users.id_users',
            'users.nama',
            DB::raw('COUNT(DISTINCT likes.id_like) as total_like'),
            DB::raw('COUNT(DISTINCT views.id_views) as total_views'),
            DB::raw('COUNT(DISTINCT comment.id_comment) + COUNT(DISTINCT replay_comment.id_replay_comment) as total_comment'),
        ])
            ->join('kategori', 'blog.id_kategori', '=', 'kategori.id_kategori')
            ->leftjoin('users', 'blog.id_user', '=', 'users.id_users')
            ->leftjoin('likes', 'blog.id_blog', '=', 'likes.id_blog')
            ->leftjoin('views', 'blog.id_blog', '=', 'views.id_blog')
            ->leftjoin('comment', 'blog.id_blog', '=', 'comment.id_blog')
            ->leftjoin('replay_comment', 'comment.id_comment', '=', 'replay_comment.id_comment')
            ->groupBy([
                'blog.id_blog',
                'blog.id_user',
                'blog.tanggal',
                'blog.title',
                'blog.content',
                'blog.image_url',
                'kategori.kategori',
                'users.id_users',
                'users.nama',
            ])
            ->get();
        $view = $this->id_blog ? View::where('id_blog', $this->id_blog)->count() : 0;
        $count_blog = Blog::count();

        $top_views = Blog::select([
            'blog.id_blog',
            'blog.id_user',
            'blog.tanggal',
            'blog.title',
            'blog.content',
            'blog.image_url',
            'kategori.kategori',
            'users.id_users',
            'users.nama',
            DB::raw('COUNT(DISTINCT likes.id_like) as total_like'),
            DB::raw('COUNT(DISTINCT views.id_views) as total_views')
        ])
            ->join('kategori', 'blog.id_kategori', '=', 'kategori.id_kategori')
            ->leftjoin('users', 'blog.id_user', '=', 'users.id_users')
            ->leftjoin('likes', 'blog.id_blog', '=', 'likes.id_blog')
            ->leftjoin('views', 'blog.id_blog', '=', 'views.id_blog')
            ->groupBy([
                'blog.id_blog',
                'blog.id_user',
                'blog.tanggal',
                'blog.title',
                'blog.content',
                'blog.image_url',
                'kategori.kategori',
                'users.id_users',
                'users.nama',
            ])
            ->orderByDesc('total_views')
            ->limit(5)
            ->get();
        $count_top_views = $top_views->count();
        return view('livewire.home-blog', [
            'data' => $data,
            'view' => $view,
            'count_blog' => $count_blog,
            'top_views' => $top_views,
            'count_top_views' => $count_top_views,
        ]);
    }

    public function viewBlog($id_blog)
    {
        $user = View::where('id_user', auth()->user()->id_users)
            ->where('id_blog', $id_blog)
            ->first();

        session()->put('id_blog', $id_blog);
        $this->id_blog = $id_blog;

        if (empty($user)) {
            View::create([
                'id_blog' => $id_blog,
                'id_user' => auth()->user()->id_users,
            ]);
        }
        return redirect('/view-blog');
    }
}
