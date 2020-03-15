<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use DB;

class MessageController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$contact = DB::table('contacts')
    					->orderBy('id', 'desc')
    					->get();
    	return view('backend.message.index', compact('contact'));
    }

    public function destroy($id)
    {
    	$message = Contact::find($id);
    	if ($message->delete()) {
            \Toastr::success('Berhasil menghapus pesan', 'Berhasil');
            return redirect()->back();
        } else {
            \Toastr::warning('Gagal menghapus pesan', 'Gagal');
            return redirect()->back();
        }
    }
}
