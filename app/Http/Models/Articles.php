<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = "articles";
    protected $fillable = [
        'id',
        'image',
        'title',
        'content',
        'categories_id',
        'author',
        'created_at',
        'updated_at'
    ];
}
