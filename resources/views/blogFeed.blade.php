@extends('layouts.app')

    @section('content')
        <div class="container">
            <h1>Articles</h1>
            @foreach($articles as $article)
                <article>
                    <header>
                        <h1>{{$article->title}}</h1>
                        <!-- Post Data: Byline, dateline -->
                    </header>
                    <main>
                        <!-- Article Content -->
                        <aside><img src=""></aside>
                    </main>
                    <aside>
                        {{$article->content}}
                    </aside>
                    <footer>
                        {{$article->created_at}}
                    </footer>
                </article>
            @endforeach
        </div>
    @endsection
