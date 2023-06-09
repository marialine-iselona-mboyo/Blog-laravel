<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'subject' => 'Testing contact form',
            'message' => 'Did you receive it?'
          ]);
    }
}
