<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Writer extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['writer_name'];

    public function book() {
        return $this->hasMany('App\Models\Book');
    }
}
