<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserPanel extends Component
{
    #[Layout('empty-layout')]
    public function render()
    {
        $user_data = User::where('role', 'user')->get();
        return view('livewire.user-panel', [
            'user_data' => $user_data,
        ]);
    }
    public function delete($id) {
        $data = User::findOrFail($id);
        $data->delete();
    }
    public function view($id) {
        session()->put('id_profile', $id);
        return redirect('profile-multi-user');
    }
}
