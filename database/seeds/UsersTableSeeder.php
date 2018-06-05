<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\Hash;

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
        $user->name = 'Yhensel Benitez';
        $user->email = 'yhensel@example.com';
        $user->password = Hash::make('secret');
        $user->save();

        factory(User::class, 10)->create();
    }
}
