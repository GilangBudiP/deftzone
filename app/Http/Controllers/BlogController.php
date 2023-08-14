<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the articles.
     */
    public function index()
    {
        $latestPost = Article::latest()->first();
        $articles = Article::latest()->paginate(1);
        $categories = Category::all();
        return view('user.blog.index', compact('articles', 'categories', 'latestPost'));
    }

    /**
     * Display the specified article.
     */
    public function show($slug)
    {
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
        return view('user.blog.show', compact('article', 'category', 'tableOfContents'));
    }
}
