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
        'categorie_id',
        'author',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->hasOne('App\Http\Models\Categories','categorie_id');
    }

    public function allArticles(){
        return Articles::join('categories','categories.id','=','articles.categorie_id')->select('articles.id as articleid','articles.*','categories.*')->get();
    }


    public function articleImage($request){
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $timestampName = microtime(true) . '.' . $extension;
        $request->image->move(storage_path().'/images/', $timestampName);

        return $timestampName;
    }


}
