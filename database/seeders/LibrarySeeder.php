<?php

namespace Database\Seeders;

use App\Models\Library;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Library::insert(
            [
                ['name'=>'Library1','image'=>'pexels-ricardo-esquivel-1907784'],
                ['name'=>'Library2','image'=>'pexels-pixabay-159711'],
                ['name'=>'Library3','image'=>'pexels-janko-ferlic-590493'],
                ['name'=>'Library4','image'=>null],

            ]
        );
    }
}
