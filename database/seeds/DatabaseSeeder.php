<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checking because truncate() will fail
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        $this->call(UsersTableSeeder::class);
        $this->call(OauthClientsTableSeeder::class);

        // Enable it back
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
