<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $latestPost = Article::latest()->first();
        $articles = Article::latest()->paginate(1);
        $categories = Category::all();
        return view('blog', compact('articles', 'categories', 'latestPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $article = Article::where('slug', $slug)->firstOrFail();

         // Extract headings based on custom tags
        preg_match_all('/<h([1-6])>(.*?)<\/h[1-6]>/i', $article->body, $headings);

    // Generate the table of contents
        $tableOfContents = '';
        foreach ($headings[2] as $index => $heading) {
            $level = $headings[1][$index];
            $anchor = Str::slug($heading);
            $tableOfContents .= "<li><a href='#$anchor'>$heading</a></li>";
            $article->body = str_replace($headings[0][$index], "<h$level id='$anchor'>$heading</h$level>", $article->body);
        }
        $category = Category::all();
        return view('blog-detail', compact('article', 'category', 'tableOfContents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
