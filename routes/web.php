<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');
Route::get('profile', 'HomeController@profile')->name('profile');
Route::get('baca/{slug}', 'HomeController@readPost')->name('baca.post');
Route::get('semua-berita-dan-artikel', 'HomeController@posts')->name('post.semua');

Route::get('semua-galeri', 'HomeController@gallery')->name('depan.galeri.index');
Route::get('galeri/lihat-galeri/{id}', 'HomeController@galleryRead')->name('depan.galeri.show');

Route::get('kontak', 'HomeController@contact')->name('depan.kontak');
Route::post('kirim-pesan', 'HomeController@saveContact')->name('depan.kontak.simpan');

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('pengaturan', 'SettingController@index')->name('admin.settings');
    Route::post('update', 'SettingController@update')->name('admin.setting.update');
    Route::post('updateProfile', 'SettingController@updateProfile')->name('admin.setting.update.profile');
    Route::post('updateTopBanner', 'SettingController@updateTopBanner')->name('admin.setting.update.banner.top');
    Route::post('updateSideBanner', 'SettingController@updateSideBanner')->name('admin.setting.update.banner.side');
    Route::post('updateSideChildBanner', 'SettingController@updateSideChildBanner')->name('admin.setting.update.banner.side.child');
    Route::post('updateMiddleBanner', 'SettingController@updateMiddleBanner')->name('admin.setting.update.banner.middle');
    Route::post('updateFooterBanner', 'SettingController@updateFooterBanner')->name('admin.setting.update.banner.footer');

    Route::post('updateSocialMedia', 'SettingController@updateSocialMedia')->name('admin.setting.update.socialMedia');


    Route::post('updateCarouselSatu', 'SettingController@updateCarouselSatu')->name('admin.setting.update.carousel.satu');
    Route::post('updateCarouselDua', 'SettingController@updateCarouselDua')->name('admin.setting.update.carousel.dua');
    Route::post('updateCarouselTiga', 'SettingController@updateCarouselTiga')->name('admin.setting.update.carousel.tiga');

    Route::resource('post', 'PostController');
    Route::resource('kategori', 'CategoryController', ['except' => ['create', 'edit', 'show']]);

    Route::resource('galeri', 'GalleryController', ['except' => ['show']]);
    Route::post('galeri-add-photo', 'GalleryController@addPhoto')->name('galeri.photo.store');
    Route::delete('galeri-delete-photo/{photo}', 'GalleryController@deletePhoto')->name('galeri.photo.delete');

    Route::get('pesan', 'MessageController@index')->name('admin.pesan.index');
    Route::delete('hapus-pesan/{id}', 'MessageController@destroy')->name('admin.pesan.destroy');

    Route::get('profile', 'SettingController@profile')->name('admin.profile');
    Route::post('ubah-email', 'SettingController@updateEmail')->name('admin.profile.update.email');
    Route::patch('ubah-password', 'SettingController@updatePassword')->name('admin.update.password');
});
