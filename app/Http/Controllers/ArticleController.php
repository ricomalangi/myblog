<?php

namespace App\Http\Controllers;
use App\User;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $article = Article::with(['get_user', 'get_category'])->get();
        //dd($article);
        return view('admin.article.index', ['article' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('nama', 'ASC')->get();
        return view('admin.article.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
            'category_id' => 'required|numeric'
        ]);
        $sampul = 'https://via.placeholder.com/150';
        if($request->hasFile('sampul')){
            $sampul = $request->file('sampul')->store('assets/image', 'public');
        }
        $upload = Article::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'konten' => $request->konten,
            'sampul' => $sampul,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'status' => $request->status
        ]);
        // dd($upload);
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
