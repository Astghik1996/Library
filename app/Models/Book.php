<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    protected $guarded=[];

    /**
     * @return BelongsToMany
     */
    public function libraries(): BelongsToMany
    {
        return $this->belongsToMany(Book::class,'book_library');
    }
}
