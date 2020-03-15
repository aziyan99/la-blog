<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Gallery extends Model
{
    protected $fillable = [
        'gallery_name'
    ];

    public function Photos()
    {
        return $this->hasMany(Photo::class);
    }
}
