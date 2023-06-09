<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Paul Neruba',
            'message' => 'While I am writing, I am far away and when I come back, I have gone.',
            'user_id' => 1,
          ]);
    }
}
