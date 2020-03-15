<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Gallery;
use App\Photo;
use App\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('category')
                        ->limit(4)
                        ->orderBy('id', 'desc')
                        ->get();
        return view('frontend.index', compact('posts'));
    }

    public function posts()
    {
         $posts = Post::with('category')
                        ->orderBy('id', 'desc')
                        ->paginate(6);
        return view('frontend.post.index', compact('posts'));
    }

    public function readPost($slug)
    {
        $post = Post::where('slug', $slug)->with('category')->first();
        return view('frontend.post.read', compact('post'));
    }

    public function profile()
    {
        return view('frontend.profile');
    }

    public function gallery()
    {
        $galleries = Gallery::with('photos')
                        ->orderBy('id', 'desc')
                        ->paginate(6);

        return view('frontend.gallery.index', compact('galleries'));
    }

    public function galleryRead($id)
    {
        $gallery = Gallery::find($id)
                        ->with('photos')
                        ->first();

        return view('frontend.gallery.show', compact('gallery'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function saveContact(Request $request)
    {
        $field = $request->all();
        $contact = new Contact([
            'nama' => $field['nama'],
            'email_nohp' => $field['email_nohp'],
            'pesan' => $field['pesan']
        ]);

        if ($contact->save()) {
            \Toastr::success('Terima Kasih Telah Menghubungi Kami', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::danger('Terima Kasih Telah Menghubungi Kami', 'Berhasil');
            return redirect()->back();
        }
    }
}
