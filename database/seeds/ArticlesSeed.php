<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class ArticlesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('articles')->insert([
            'id' => Str::random(5),
            'title' => Str::random(10),
            'image' => Str::random(60),
            'content' => Str::random(300),
            'categorieId' => 2,
            'createdAt' => Str::random(6),
            'updatedAt' => Str::random(6),
        ]);
        DB::table('categories')->insert([
            'id' => Str::random(5),
            'name' => Str::random(10),
            'createdAt' => Str::random(6),
            'updatedAt' => Str::random(6),
        ]);

    }
}
