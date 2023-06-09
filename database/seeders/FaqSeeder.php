<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FAQ;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FAQ::create([
            'category_id' => 1,
            'question' => 'How do I register?',
            'answer' => 'You will have to click on register',
          ]);
    }
}
