<?php

namespace App\Repositories;

use App\Contracts\BookLibraryContract;
use Illuminate\Support\Facades\DB;

class BookLibraryRepo implements BookLibraryContract
{
    public function store(array $data)
    {
      return DB::table('book_library')->insert($data);
    }
}
