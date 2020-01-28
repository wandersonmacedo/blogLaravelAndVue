<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\Articles;
use App\Http\Models\Categories;
use Illuminate\Http\Request;


class BlogFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = new Articles();
        return $articles->allArticles();
    }

    public function allarticles(Request $request)
    {

        $articles = Articles::join('categories','articles.categorie_id','=','categories.id')
                            ->join('users','users.id','=','articles.author')
                            ->select('categories.*','categories.name as categoryName','articles.*','articles.id as articlesId','users.name as author')
                            ->where('title','like','%'.$request->search.'%')
                            ->orWhere('users.name','like','%'.$request->search.'%')
                            ->orWhere('categories.name','like','%'.$request->search.'%')
                            ->get();


        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
