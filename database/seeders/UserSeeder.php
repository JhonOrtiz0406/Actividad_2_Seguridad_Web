<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        User::factory()->create([
            'name' => 'Jhon',
            'lastname' => 'Orti',
            'dni' => '10029000000',
            'email' => 'seguridadweb@campusviu.es',
            'password' => Hash::make('S3gur1d4d?W3b'),  // Contraseña encriptada
            'phone' => '+3218433333',
            'country' => 'Colombia',
            'about' => 'Soy un desarrollador backend',
        ]);
    }
}
