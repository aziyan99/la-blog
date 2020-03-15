<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'system_name' => 'LBlog',
            'logo' => 'test.jpg',
            'site_title' => 'Blog Somple',
            'site_description' => 'Simple Blog Site',
            'profile_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam porttitor justo ipsum, at pulvinar quam porta sed. Praesent fringilla sagittis mi, eu commodo metus rutrum at. Phasellus a efficitur mi, eget consequat dui. Fusce nec aliquet ligula. Integer mollis purus non elementum efficitur. Cras purus ex, elementum in finibus ut, placerat vel odio. Maecenas hendrerit vel tellus sit amet bibendum. Sed non imperdiet orci. Aenean pretium fringilla suscipit.',
            'top_banner' => 'headerbanner.png',
            'side_banner' => 'sidebanner.png',
            'side_child_banner' => 'sidebannerchild.png',
            'footer_banner' => 'footerbanner.png',
            'facebook_fanspage' => 'https://facebook.com',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://facebook.com',
            'youtube' => 'https://youtube.com',
            'twitter' => 'https://twitter.com',
            'carousel_img1' => 'carousel.png',
            'carousel_img2' => 'carousel.png',
            'carousel_img3' => 'carousel.png',
            'middle_banner' => 'middlebanner.png',
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
