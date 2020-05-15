<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $guarded = [];

    public function categoryHasArticles()
    {
        return $this->hasMany('App\Article');
    }
}
