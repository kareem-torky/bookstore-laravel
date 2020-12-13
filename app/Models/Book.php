<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'desc', 'img', 'cat_id'
    ];

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }
}
