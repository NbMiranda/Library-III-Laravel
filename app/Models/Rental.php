<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'book_id',
        'return_in',
        'expires_in',
        'rented_book'
    ];
}
