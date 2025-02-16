<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    #[Layout('master')]

    public $id_user;
    public $nama, $image_profile, $id_profile;

    public $rules = [
        'image_url' => 'nullable|image|max:1024',
    ];
    public function mount()
    {
        $this->id_user = Auth::user()->id_users;
    }
    public function render()
    {
        $viewTotal = Blog::where('blog.id_user', $this->id_user)
            ->select(DB::raw('SUM(COUNT(views.id_views)) OVER() as total_views'))
            ->leftjoin('views', 'blog.id_blog', '=', 'views.id_blog')
            ->groupBy('blog.id_blog')
            ->value('total_views');

        $totalLike = Blog::where('blog.id_user', $this->id_user)
            ->select(DB::raw('SUM(COUNT(likes.id_like)) OVER() as total_likes'))
            ->leftjoin('likes', 'blog.id_blog', 'likes.id_blog')
            ->groupBy('blog.id_blog')
            ->value('total_likes');

        $data = Blog::where('id_user', $this->id_user);
        $data_count = $data->count();
        return view('livewire.profile', [
            'data_count' => $data_count,
            'total_views' => $viewTotal,
            'total_likes' => $totalLike,
        ]);
    }
    public function getIdProfile($id)
    {
        $data = User::find($id);
        $this->id_profile = $data->id_users;
        $this->nama = $data->nama;
        $this->image_profile = json_decode($data->image_profile);
    }

    public function update()
    {
        if ($this->image_profile instanceof UploadedFile) {
            $name_image = $this->image_profile->getClientOriginalName();
            $path = $this->image_profile->storeAs('images', $name_image, 'public');
        } else {
            $path = $this->image_profile;
        }
        $data = User::findOrFail($this->id_profile);
        $data->update([
            'nama' => $this->nama,
            'image_profile' => json_encode($path),
        ]);
        return redirect('/profile');
    }
}
