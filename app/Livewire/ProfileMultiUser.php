<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProfileMultiUser extends Component
{
    public $id_profile;

    #[Layout('empty-layout')]
    public function mount() {
        $this->id_profile = session()->get('id_profile');
    }
    public function render()
    {
        $viewTotal = Blog::where('blog.id_user', $this->id_profile)
            ->select(DB::raw('SUM(COUNT(views.id_views)) OVER() as total_views'))
            ->leftjoin('views', 'blog.id_blog', '=', 'views.id_blog')
            ->groupBy('blog.id_blog')
            ->value('total_views');

        $totalLike = Blog::where('blog.id_user', $this->id_profile)
            ->select(DB::raw('SUM(COUNT(likes.id_like)) OVER() as total_likes'))
            ->leftjoin('likes', 'blog.id_blog', 'likes.id_blog')
            ->groupBy('blog.id_blog')
            ->value('total_likes');

        $user = User::where('id_users', $this->id_profile)->first();
        $data = Blog::where('id_user', $this->id_profile);
        $data_count = $data->count();

        return view('livewire.profile-multi-user', [
            'data_count' => $data_count,
            'total_views' => $viewTotal,
            'total_likes' => $totalLike,
            'user' => $user,
        ]);
    }

    public function kembali() {
        return redirect('/view-blog');
    }
}
