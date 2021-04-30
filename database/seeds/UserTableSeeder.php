<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Owner;
use App\Client;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        User::truncate();
        $faker = \Faker\Factory::create();

        $password = Hash::make('viveresdaniela');
        $owner = Owner::create(['store_name' => 'Viveres Daniela']);
        $owner->user()->create([
            'name' => 'Pablo Ríos',
            'email' => 'viveresdani@gmail.com',
            'password' => $password,
            'role' => 'ROLE_ADMIN',
            'active' => true,
            'activation_code' => ' ',
        ]);

        /* Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            $client = Client::create([
                'home_number' => $faker->numberBetween(1, 30),
            ]);

            $client->user()->create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'role' => 'ROLE_CLIENT',
                'activation_code'=> $faker->slug,
            ]);

        }*/
    }
}
