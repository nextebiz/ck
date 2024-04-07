<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles  = Article::orderBy('id', 'desc')
            ->where('user_id', Auth::user()->id)
            ->paginate(10);

        return Inertia::render('Article/Index')->with(['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Article/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        // dd($request->all());
        Article::create($request->all());

        return to_route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {

        return Inertia::render('Article/Show')->with(['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return Inertia::render('Article/Edit')->with(['article' => $article]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        return to_route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return to_route('articles.index');
    }
}
