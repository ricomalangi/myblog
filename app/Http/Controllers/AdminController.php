<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $artilce = Article::count('id');
        $category = Category::count('nama');
        $publish = Article::where('status', 'publish')->count();
        $draft = Article::where('status', 'draft')->count();
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'article' => $artilce,
            'category' => $category,
            'publish' => $publish,
            'draft' => $draft
        ]);
    }
}
