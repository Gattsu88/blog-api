<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Comment;

class PagesController extends Controller
{
    public function getHome()
    {
        $latestArticles = Article::latest()->paginate(5);
        $latestComments = Comment::latest()->paginate(5);

        return view('pages.home', ['latestArticles' => $latestArticles, 'latestComments' => $latestComments]);
    }

    public function getContact()
    {
        return view('pages.contact');
    }
}
