<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$user = new User();
        $user->name = 'Admin';
        $user->username = 'Admin';
        $user->email = 'admin@ehb.be';
        $user->date_of_birth = '17-12-1998';
        $user->about_me = 'I am the creator of the site';
        $user->password = Hash::make('Password!321');
        $user->is_admin = 1;
        $user->save();*/

        User::create([
          'name' => 'Admin',
          'username' => 'Admin',
          'date_of_birth' => '01-01-1900',
          'about_me' => 'I am the creator of the site',
          'email' => 'admin@ehb.be',
          'is_admin' => 1,
          'password' => Hash::make('Password!321')
        ]);
    }
}
