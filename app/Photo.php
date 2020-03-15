<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;

class Photo extends Model
{
    protected $fillable = [
        'gallery_id', 'photo'
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
