<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name', 
        'genre', 
        'book_cover', 
        'writer_id', 
        'synopsis'
    ];

}
