<?php

namespace App\Http\Controllers;

use App\Http\Models\Categories;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addArticle(){
        $categories = Categories::all();
        return view('addArticle');
    }
}
