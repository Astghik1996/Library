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
                ['name'=>'Library1'],
                ['name'=>'Library2'],
                ['name'=>'Library3'],
                ['name'=>'Library4'],

            ]
        );
    }
}
