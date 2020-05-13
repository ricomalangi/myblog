<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [];

    public function userArticles()
    {
        return $this->belongsTo('App\User');
    }
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
