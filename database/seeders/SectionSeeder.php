<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Library;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rafael = Library::where('name', 'Biblioteca Rafael García Herreros')->first();
        $diego = Library::where('name', 'Biblioteca Diego Jaramillo')->first();

        Section::create([
            'name' => 'Historia',
            'library_id' => $rafael->id,
        ]);

        Section::create([
            'name' => 'Ciencias sociales',
            'library_id' => $rafael->id,
        ]);

        Section::create([
            'name' => 'Literatura',
            'library_id' => $rafael->id,
        ]);

        Section::create([
            'name' => 'Historia',
            'library_id' => $diego->id,
        ]);

        Section::create([
            'name' => 'Ciencias sociales',
            'library_id' => $diego->id,
        ]);

        Section::create([
            'name' => 'Literatura',
            'library_id' => $diego->id,
        ]);

        Section::create([
            'name' => 'Matematicas',
            'library_id' => $diego->id,
        ]);
    }
}
