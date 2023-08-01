<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreArticleRequest $request)
    {

        // dd($request->all());
        // $quillContent = json_decode($request->input('body'), true);

        $thumbnailFileName = time() . '_thumbnail.' . $request->file('thumbnail')->getClientOriginalExtension();
        $request->file('thumbnail')->storeAs('public/images', $thumbnailFileName);

        Article::create([
            'title' => $request->input('title'),
            'thumbnail' => $thumbnailFileName,
            'slug' => Str::slug($request->input('title')),
            'author_id' => Auth::user()->id,
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }


}
