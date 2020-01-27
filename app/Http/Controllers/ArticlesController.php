<?php

namespace App\Http\Controllers;

use App\Http\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addArticle(){
        return view('addArticle');
    }
}
