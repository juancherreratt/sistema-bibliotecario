<?php

namespace Database\Seeders;
use App\Models\Library;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Library::create(['name' => 'Biblioteca Rafael García Herreros']);
        Library::create(['name' => 'Biblioteca Diego Jaramillo']);
    }
}
