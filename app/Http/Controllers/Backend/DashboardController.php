<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$message = DB::table('contacts')
			->orderBy('id', 'desc')
			->limit(5)
			->get();
		$countGallery = DB::table('galleries')->count();
		$countPhoto = DB::table('photos')->count();
		$countPost = DB::table('posts')->count();
		$countMessage = DB::table('contacts')->count();
		$user = Auth::user()->name;
		\Toastr::success('Selamat Datang ' . $user, 'Hallo');
		return view('backend.dashboard.index', compact('countGallery', 'countPhoto', 'countMessage', 'countPost', 'message'));
	}
}
