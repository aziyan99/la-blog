<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'system_name',  'site_title', 'logo', 'site_description', 'profile_desc', 'top_banner', 'side_banner', 'side_child_banner', 'footer_banner', 'facebook_fanspage', 'facebook', 'twitter', 'instagram', 'youtube', 'carousel_img1', 'carousel_img2', 'carousel_img3', 'middle_banner'
    ];
}
