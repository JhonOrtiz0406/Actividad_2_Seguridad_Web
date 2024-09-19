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
    public function run()
    {
        User::create([
            'name' => 'Usuario Prueba',
            'email' => 'seguridadweb@campusviu.es',
            'password' => Hash::make('S3gur1d4d?W3b'),
        ]);
    }
}
