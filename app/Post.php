<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;


class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'post', 'category_id', 'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
