<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;
use Livewire\WithPagination;
class CategoryIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $data = Category::latest()->paginate(5);
        return view('livewire.category-index', ['category' => $data]);
    }
}
