<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
        $article = Article::with(['get_user', 'get_category'])->orderBy('id', 'DESC')->get();
        //dd($article);
        return view('admin.article.index', [
            'article' => $article,
            'title' => 'Article'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('nama', 'ASC')->get();
        return view('admin.article.create', [
            'category' => $category,
            'title' => 'Create Article'    
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
            'category_id' => 'required|numeric',
            'sampul' => 'file|image'
        ]);
        $sampul = 'https://via.placeholder.com/150';
        if($request->hasFile('sampul')){
            $sampul = $request->file('sampul')->store('images');
        }
        Article::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'konten' => $request->konten,
            'sampul' => $sampul,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'status' => $request->status
        ]);
        return redirect()->route('article.index')->with('success', 'artike berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.article.show', [
            'article' => $article,
            'title' => 'Article detail'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $category = Category::get(['category_id', 'nama']);
        return view('admin.article.edit', [
            'article' => $article,
            'category' => $category,
            'title' => 'Edit Article' 
        ]);
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
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
            'category_id' => 'required|numeric',
            'sampul' => 'file|image'
        ]);
        $sampul = $article->sampul;
        if($request->hasFile('sampul')){
            Storage::delete($article->sampul);
            $sampul = $request->file('sampul')->store('images');
        }
        $article->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'konten' => $request->konten,
            'sampul' => $sampul,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'status' => $request->status
        ]);
        return redirect()->route('article.index')->with('info', 'artikel berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $image_path = $article->sampul;
        if(public_path($image_path)){
            Storage::delete($article->sampul);
        }
        $article->delete();
        return redirect()->route('article.index');
    }
}
