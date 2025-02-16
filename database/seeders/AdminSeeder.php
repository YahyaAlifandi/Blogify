<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'yanto',
            'email' => 'yanto@gmail.com',
            'password' => 'yanto',
            // 'image_profile' => 'img1',
        ]);
    }
}
