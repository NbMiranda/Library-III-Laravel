<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name', 
        'genre', 
        'book_cover', 
        'writer_id', 
        'synopsis',
        'status'
    ];
    public function writer() {
        return $this->belongsTo('App\Models\Writer');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'rentals');

    }
}
