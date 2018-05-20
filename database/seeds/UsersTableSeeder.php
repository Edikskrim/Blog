<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->truncate();
        $user->create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => '$2y$10$34B7PD0IDkoZpVP9./Ufvuw6q9.ug6zC4Zh5PUwXvsBT7GmMTEvSq', // root123
            'status' => '1',
            'verified' => '1',
        ]);
    }
}
