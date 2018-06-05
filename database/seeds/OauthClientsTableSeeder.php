<?php

use Illuminate\Database\Seeder;
use Laravel\Passport\Client;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::create([
            'name'                   => env('APP_NAME') . ' Password Grant Client',
            'secret'                 => 'secret',
            'redirect'               => env('APP_URL'),
            'password_client'        => true,
            'personal_access_client' => true,
        ]);

        \Laravel\Passport\PersonalAccessClient::create([
            'client_id' => $client->id,
        ]);
    }
}
