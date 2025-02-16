<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminPannel extends Component
{
    #[Layout('empty-layout')]
    public function render()
    {
        $user_total = User::all()->count();
        $blog_total = Blog::all()->count();
        return view('livewire.admin-pannel', [
            'user_total' => $user_total,
            'blog_total' => $blog_total,
        ]);
    }
}
