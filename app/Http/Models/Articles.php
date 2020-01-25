<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'id',
        'image',
        'title',
        'content',
        'categoriesId',
        'createdAt',
        'updatedAt'
    ];
}
