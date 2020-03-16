<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $settings = Setting::where('id', 1)->first();
        return view('backend.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $setting = Setting::find(1);
        if ($request->file('logo')) {
            $logo = $request->file('logo')->store('logo_system');
            $setting->system_name = $request->post('system_name');
            $setting->logo = $logo;
            $setting->site_title = $request->post('site_title');
            $setting->site_description = $request->post('site_description');
        } else {
            $setting->system_name = $request->post('system_name');
            $setting->site_title = $request->post('site_title');
            $setting->site_description = $request->post('site_description');
        }

        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request)
    {
        $setting = Setting::find(1);
        $setting->profile_desc = $request->post('profile_desc');
        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateTopBanner(Request $request)
    {
        $setting = Setting::find(1);

        $topBanner = $request->file('top_banner')->store('banners');

        // $image = $request->file('top_banner');
        // $target = 'assets/banners';
        // $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        // $image->move($target, $renameImage);

        $setting->top_banner = $topBanner;
        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateSideBanner(Request $request)
    {
        $setting = Setting::find(1);

        $image = $request->file('side_banner');
        $target = 'assets/banners';
        $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($target, $renameImage);

        $setting->side_banner = $renameImage;
        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateSideChildBanner(Request $request)
    {
        $setting = Setting::find(1);

        $image = $request->file('side_child_banner');
        $target = 'assets/banners';
        $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($target, $renameImage);

        $setting->side_child_banner = $renameImage;
        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateMiddleBanner(Request $request)
    {
        $setting = Setting::find(1);

        $image = $request->file('middle_banner');
        $target = 'assets/banners';
        $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($target, $renameImage);

        $setting->middle_banner = $renameImage;
        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateFooterBanner(Request $request)
    {
        $setting = Setting::find(1);

        $image = $request->file('footer_banner');
        $target = 'assets/banners';
        $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($target, $renameImage);

        $setting->footer_banner = $renameImage;
        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateCarouselSatu(Request $request)
    {
        $setting = Setting::find(1);

        $image = $request->file('carousel_img1');
        $target = 'assets/banners';
        $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($target, $renameImage);

        $setting->carousel_img1 = $renameImage;
        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateCarouselDua(Request $request)
    {
        $setting = Setting::find(1);

        $image = $request->file('carousel_img2');
        $target = 'assets/banners';
        $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($target, $renameImage);

        $setting->carousel_img2 = $renameImage;
        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateCarouselTiga(Request $request)
    {
        $setting = Setting::find(1);

        $image = $request->file('carousel_img3');
        $target = 'assets/banners';
        $renameImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($target, $renameImage);

        $setting->carousel_img3 = $renameImage;
        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function updateSocialMedia(Request $request)
    {
        $setting = Setting::find(1);
        $setting->facebook_fanspage = $request->post('facebook_fanspage');
        $setting->facebook = $request->post('facebook');
        $setting->instagram = $request->post('instagram');
        $setting->twitter = $request->post('twitter');
        $setting->youtube = $request->post('youtube');

        if ($setting->push()) {
            \Toastr::success('Berhasil mengubah pengaturan', 'Success');
            return redirect()->back();
        }
    }

    public function profile()
    {
        $profile = User::find(1);
        return view('backend.profile.index', compact('profile'));
    }

    public function updateEmail(Request $request)
    {
        $email = User::find(1);
        $email->email = $request->post('email');
        if ($email->push()) {
            \Toastr::success('Berhasil mengubah email', 'Success');
            return redirect()->back();
        }
    }

    /**
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        \Toastr::success('Berhasil mengubah kata sandi', 'Success');
        return redirect()->route('admin.profile');
    }
}
