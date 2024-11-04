<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => "Jacky",
            'email' => "estudio@estudio.com",
            'email_verified_at' => null,
            'password' => Hash::make('estudio'),
            'remember_token' => null,
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => "Prueba",
            'email' => "empresa1@empresa.com",
            'email_verified_at' => null,
            'password' => Hash::make('empresa1'),
            'remember_token' => null,
        ]);
    
    DB::table('users')->insert([
            'id' => 3,
            'name' => "Tomas",
            'email' => "empresa2@empresa.com",
            'email_verified_at' => null,
            'password' => Hash::make('empresa2'),
            'remember_token' => null,
        ]);

        DB::table('users')->insert([
    'id' => 4,
    'name' => "Luis",
    'email' => "trabajador1@trabajador.com",
    'email_verified_at' => null,
    'password' => Hash::make('trabajador1'),
    'remember_token' => null,
]);

DB::table('users')->insert([
    'id' => 5,
    'name' => "Ana",
    'email' => "trabajador2@trabajador.com",
    'email_verified_at' => null,
    'password' => Hash::make('trabajador2'),
    'remember_token' => null,
]);

DB::table('users')->insert([
    'id' => 6,
    'name' => "Carlos",
    'email' => "trabajador3@trabajador.com",
    'email_verified_at' => null,
    'password' => Hash::make('trabajador3'),
    'remember_token' => null,
]);

DB::table('users')->insert([
    'id' => 7,
    'name' => "María",
    'email' => "trabajador4@trabajador.com",
    'email_verified_at' => null,
    'password' => Hash::make('trabajador4'),
    'remember_token' => null,
]);

DB::table('users')->insert([
    'id' => 8,
    'name' => "Andrés",
    'email' => "trabajador5@trabajador.com",
    'email_verified_at' => null,
    'password' => Hash::make('trabajador5'),
    'remember_token' => null,
]);

    }
}
