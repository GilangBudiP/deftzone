<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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

        return redirect()->route('articles.index')->with('success', 'Article has been saved successfully!');
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
        $category = Category::all();
        return view('admin.article.edit', compact('article', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $article = Article::findOrFail($id);
        $request->validate([
            'title' => 'required|max:255',
            'slug' =>  [
                'required',
                Rule::unique('articles')->ignore($id),
            ],
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // example validation for image upload
            'body' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::delete('public/images/' . $article->thumbnail);
            }
            $thumbnailFileName = time() . '_thumbnail.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('public/images', $thumbnailFileName);
            $article->thumbnail = $thumbnailFileName;
        }

        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));
        $article->body = $request->input('body');
        $article->category_id = $request->input('category_id');
        $article->status = $request->input('status');

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        Storage::delete('public/images/' . $article->foto);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article has been Removed successfully!');
    }
}
