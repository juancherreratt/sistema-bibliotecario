<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Library;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rafael = Library::where('name', 'Biblioteca Rafael García Herreros')->first();
        $diego = Library::where('name', 'Biblioteca Diego Jaramillo')->first();

        User::create([
            'name' => 'Bibliotecario Rafael',
            'email' => 'rafael@uniminuto.edu.co',
            'password' => Hash::make('password'),
            'library_id' => $rafael->id,
        ]);

        User::create([
            'name' => 'Bibliotecario Diego',
            'email' => 'diego@uniminuto.edu.co',
            'password' => Hash::make('password'),
            'library_id' => $diego->id,
        ]);
    }
}
