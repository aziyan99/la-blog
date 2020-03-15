<?php

namespace App\Http\Controllers\Backend;

use App\Gallery;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{

    public function __construct()
        {
            $this->middleware('auth');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('backend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gallery_name' => 'required'
        ]);

        $storeGallery = new Gallery([
            'gallery_name' => $request->post('gallery_name')
        ]);

        if ($storeGallery->save()) {
            \Toastr::success('Berhasil menambah Gallery', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::warning('Berhasil menambah Gallery', 'Gagal');
            return redirect()->back();
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        $photos = Photo::where('gallery_id', $id)->get();
        return view('backend.gallery.edit', compact('gallery', 'photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->gallery_name = $request->post('gallery_name');
        if ($gallery->push()) {
            \Toastr::success('Berhasil mengubah nama galeri', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::warning('Gagal mengubah nama galeri', 'Gagal');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::with('Photos')->find($id);
        
        foreach ($gallery->photos as $data) {
            $image = $data->photo;
            $path = 'assets/gallery';
            $deleteImage = $path . "/" . $image;
            if (\File::exists($deleteImage)) {
                \File::delete($deleteImage);
            }
        }
        if ($gallery->delete()) {
            \Toastr::success('Berhasil menghapus galeri', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::warning('Gagal menghapus galeri', 'Gagal');
            return redirect()->back();
        }
    }

    public function addPhoto(Request $request)
    {
        $image = $request->file('photo');
        $id = $request->post('gallery_id');
        $target = 'assets/gallery';
        $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($target, $renameImage);
        $photoPost = new Photo([
            'gallery_id' => $id,
            'photo' => $renameImage
        ]);
        if ($photoPost->save()) {
            \Toastr::success('Berhasil menambah gambar', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::warning('Berhasil menambah gambar', 'Gagal');
            return redirect()->back();
        }
    }

    public function deletePhoto($id)
    {
        $photo = Photo::find($id);
        $image = $photo->photo;
        $path = 'assets/gallery';
        $deleteImage = $path . "/" . $image;
        if (\File::exists($deleteImage)) {
            \File::delete($deleteImage);
        }
        if ($photo->delete()) {
            \Toastr::success('Berhasil menghapus gambar', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::warning('Berhasil menghapus gambar', 'Gagal');
            return redirect()->back();
        }
    }
}
