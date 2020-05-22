<?php

namespace App\Http\Livewire;

use App\Article;
use Livewire\Component;
use Livewire\WithPagination;
class ArticleIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $data = Article::latest()->paginate(5);
        return view('livewire.article-index', ['articles' => $data]);
    }
}
