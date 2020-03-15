<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use Alert;
use File;

class PostController extends Controller
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
        $posts = Post::with('category')->orderBy('id', 'desc')->get();
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.post.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                'title' => 'required',
                'category_id' => 'required',
                'image' => 'required',
                'post' => 'required'
            ],
            [
                'title.required' => 'Judul tidak boleh kosong',
                'post.required' => 'Post tidak boleh kosong',
                'category_id.required' => 'Kategori tidak boleh kosong',
                'image.required' => 'Gambar tidak boleh kosong',
            ]
        );

        $field = $request->all();
        $image = $request->file('image');
        $target = 'assets/images';
        $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($target, $renameImage);
        $storePost = new Post([
            'title' => $field['title'],
            'slug' => $field['slug'],
            'image' => $renameImage,
            'post' => $field['post'],
            'category_id' => $field['category_id'],
        ]);
        if ($storePost->save()) {
            \Toastr::success('Berhasil menambah berita', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::warning('Berhasil menambah berita', 'Gagal');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::all();
        $post = Post::where('slug', $slug)->first();
        return view('backend.post.edit', compact('post', 'category'));
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
        request()->validate(
            [
                'title' => 'required',
                'category_id' => 'required',
                'post' => 'required'
            ],
            [
                'title.required' => 'Judul tidak boleh kosong',
                'post.required' => 'Post tidak boleh kosong',
                'category_id.required' => 'Kategori tidak boleh kosong',
            ]
        );

        $field = $request->all();
        $image = $request->file('image');

        if ($image) {
            $target = 'assets/images';
            $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
            $image->move($target, $renameImage);

            $deleteOldImage = $target . "/" . $field['oldImage'];
            if (File::exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $post = Post::find($id);
            $post->title = $field['title'];
            $post->slug = $field['slug'];
            $post->category_id = $field['category_id'];
            $post->image = $renameImage;
            $post->post = $field['post'];

            if ($post->push()) {
                \Toastr::success('Berhasil mengubah berita', 'Berhasil');
                return redirect(route('post.index'));
            } else {
                \Toastr::warning('Gagal mengubah berita', 'Gagal');
                return redirect()->back();
            }
        } else {
            $post = Post::find($id);
            $post->title = $field['title'];
            $post->slug = $field['slug'];
            $post->category_id = $field['category_id'];
            $post->image = $field['oldImage'];
            $post->post = $field['post'];

            if ($post->push()) {
                \Toastr::success('Berhasil mengubah berita', 'Berhasil');
                return redirect(route('post.index'));
            } else {
                \Toastr::warning('Gagal mengubah berita', 'Gagal');
                return redirect()->back();
            }
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
        $post = Post::find($id);
        $image = $post->image;
        $path = 'assets/images';
        $deleteImage = $path . "/" . $image;
        if (File::exists($deleteImage)) {
            File::delete($deleteImage);
        }
        if ($post->delete()) {
            \Toastr::success('Berhasil menghapus berita', 'Berhasil');
            return redirect(route('post.index'));
        } else {
            \Toastr::warning('Gagal menghapus berita', 'Gagal');
            return redirect()->back();
        }
    }
}
