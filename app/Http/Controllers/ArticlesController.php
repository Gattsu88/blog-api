<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        $categories = Category::all();
        return view('articles.index', ['articles' => $articles, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:10|max:200',
                'body' => 'required|min:10|max:2000',
                'category_id' => 'required|integer'
            ]);

            if ($validator->fails()) {;
                return back()->withInput()->with('error', $validator->messages()->first());
            }

            $article = new Article;

            $article->title = $request->title;
            $article->body = $request->body;
            $article->category_id = $request->category_id;
            $article->user_id = Auth::id();

            $article->save();

            if($article) {
                return redirect()->route('articles.index')->with('success', 'Article created successfully');
            }
        }
        return back()->withInput()->with('error', 'You must be logged in');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = Article::find($article->id);
        $articleComments = $article->comments()->orderBy('created_at', 'desc')->get();

        return view('articles.show', ['article' => $article, 'articleComments' => $articleComments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = Article::find($article->id);
        $categories = Category::all();

        return view('articles.edit', ['article' => $article])->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $articleUpdate = Article::where('id', $article->id)->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($articleUpdate) {
            return redirect()->route('articles.show', ['article' => $article->id])->with('info', 'Article updated successfully');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $findArticle = Article::find($article->id);

        if($findArticle->delete()) {
            return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
        }
        return back()->withInput()->with('error', 'Article could not be deleted');
    }
}
