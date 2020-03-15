<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
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
            'category_name' => 'required'
        ]);

        $category = new Category([
            'category_name' => $request->input('category_name')
        ]);
        if ($category->save()) {
            \Toastr::success('Berhasil menyimpan kategori', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::danger('Gagal menyimpan kategori', 'Gagal');
            return redirect()->back();
        }
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
        $category = Category::find($id);
        $category->category_name = $request->input('category_name');
        if ($category->push()) {
            \Toastr::success('Berhasil mengubah kategori', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::danger('Gagal mengubah kategori', 'Gagal');
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
        $category = Category::find($id);
        if ($category->delete()) {
            \Toastr::success('Berhasil menghapus kategori', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::warning('Gagal menghapus kategori', 'Gagal');
            return redirect()->back();
        }
    }
}
