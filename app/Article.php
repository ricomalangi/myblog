<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [];

    public function get_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function get_category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
