<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\Articles;
use App\Http\Models\Categories;
use Illuminate\Http\Request;

class FormHandle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request["source"]=="category"){
            return $this->validateAndSaveCategory($request);
        }
        if($request["source"]=="articles"){
            return $this->validateAndSaveArticle($request);
        }
    }

    private function validateAndSaveCategory($request){
        $this->validate($request,[
            'name' => 'required|string'
        ]);
        return Categories::create([
            'name' => $request["name"],
            'created_by' => $request["created_by"],
            'created_at' => Date('Y-m-d'),
            'updated_at' => Date('Y-m-d')
        ]);
    }

    private function validateAndSaveArticle($request){
        $this->validate($request,[
            'title' => 'required|string',
            'category' => 'required|int',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article = new Articles();
        $timestampName = $article->articleImage($request);

        return Articles::create([
            'title' => $request["title"],
            'categorie_id' => $request["category"],
            'content' => $request["content"],
            'image' => $timestampName,
            'author' => $request["author"],
            'created_at' => Date('Y-m-d'),
            'updated_at' => Date('Y-m-d')
        ]);
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
