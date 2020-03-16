@extends('layouts.backend.master')

@section('breadcump')
<h1 class="mt-4">Pengaturan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pengaturan</li>
</ol>
@endsection

@section('content')
<script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Sistem dan Informasi Website
                </div>
                <div class="card-body">
                    <form action="{{route('admin.setting.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nama Sistem</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="system_name" value="{{ $settings->system_name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nama Website</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="site_title" value="{{ $settings->site_title }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Informasi Website</label>
                            <div class="col-sm-10">
                                <textarea name="site_description"  cols="30" rows="2" class="form-control">{{ $settings->site_description }}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Logo Website</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="logo">
                            </div>
                        </div>
                        <hr>
                        <div class="float-right">
                            <a href="{{route('admin.settings')}}" class="btn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Halaman Profile
                </div>
                <div class="card-body">
                    <form action="{{route('admin.setting.update.profile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Deskripsi Profil</label>
                            <div class="col-sm-10">
                                <textarea name="profile_desc" id="profile_desc"  cols="30" rows="10" class="form-control">{{ $settings->profile_desc }}</textarea>
                                 <script>
                                    CKEDITOR.replace('profile_desc');
                                </script>
                            </div>
                        </div>

                        <hr>
                        <div class="float-right">
                            <a href="{{route('admin.settings')}}" class="btn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
            <div class="card">
                <div class="card-header">Sosial Media</div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.update.socialMedia') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Facebook Fanspage</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="facebook_fanspage" value="{{ $settings->facebook_fanspage }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Facebook</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="facebook" value="{{ $settings->facebook }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Instagram</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="instagram" value="{{ $settings->instagram }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Twitter</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="twitter" value="{{ $settings->twitter }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Youtube</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="youtube" value="{{ $settings->youtube }}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right"></label>
                            <div class="col-sm-10">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 mt-3 mb-3">
            <div class="card">
                <div class="card-header">
                    Banner 
                </div>
                <div class="card-body">

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#top_banner"><i class="fa fa-image"></i>&nbsp;&nbsp;Banner Atas</button>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#side_banner"><i class="fa fa-image"></i>&nbsp;&nbsp;Banner Samping (<i>Besar</i>)</button>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#side_child_banner"><i class="fa fa-image"></i>&nbsp;&nbsp;Banner Samping (<i>Kecil</i>)</button>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#middle_banner"><i class="fa fa-image"></i>&nbsp;&nbsp;Banner Tengah (<i>Kecil</i>)</button>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#footer_banner"><i class="fa fa-image"></i>&nbsp;&nbsp;Banner Bawah</button>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 mt-3 mb-3">
            <div class="card">
                <div class="card-header">
                    Carousel 
                </div>
                <div class="card-body">

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#carousel_img1"><i class="fa fa-image"></i>&nbsp;&nbsp;Gambar Satu</button>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#carousel_img2"><i class="fa fa-image"></i>&nbsp;&nbsp;Gambar Dua</button>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#carousel_img3"><i class="fa fa-image"></i>&nbsp;&nbsp;Gambar Tiga</button>
   
                </div>
            </div>
        </div>


    </div>




<!-- Banner Atas -->
<div class="modal fade" id="top_banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Banner Atas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   <form action="{{route('admin.setting.update.banner.top')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="top_banner" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Gambar Sebelumnya</label>
                                <img src="{{ asset( $setting->top_banner) }}" alt="img" class="img-fluid">
                        </div>

                         

                        <hr>
                        <div class="float-right">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                </div>
        </div>
        </div>
    </div>
<!--  /Banner Atas -->

<!-- Banner Samping Besar -->
<div class="modal fade" id="side_banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Banner Samping (<i>Besar</i>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   <form action="{{route('admin.setting.update.banner.side')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="side_banner" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar Sebelumnya</label>
                            <div class="col-sm-10">
                                <img src="{{ asset( $setting->side_banner) }}" alt="img" class="img-fluid">
                            </div>
                        </div>

                         

                        <hr>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                </div>
        </div>
        </div>
    </div>
<!--  /Banner Samping Besar -->

<!-- Banner Samping Kecil -->
<div class="modal fade" id="side_child_banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Banner Samping (<i>Kecil</i>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   
                    <form action="{{route('admin.setting.update.banner.side.child')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="side_child_banner" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar Sebelumnya</label>
                            <div class="col-sm-10">
                                <img src="{{ asset( $setting->side_child_banner ) }}" alt="img" class="img-fluid">
                            </div>
                        </div>

                         

                        <hr>
                        <div class="float-right">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>

                             <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                </div>
        </div>
        </div>
    </div>
<!--  /Banner Samping Kecil -->


<!-- Banner Tengah Kecil -->
<div class="modal fade" id="middle_banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Banner Tengah (<i>Kecil</i>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   
                    <form action="{{route('admin.setting.update.banner.middle')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="middle_banner" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar Sebelumnya</label>
                            <div class="col-sm-10">
                                <img src="{{ asset( $setting->middle_banner ) }}" alt="img" class="img-fluid">
                            </div>
                        </div>

                         

                        <hr>
                        <div class="float-right">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>


                             <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                </div>
        </div>
        </div>
    </div>
<!--  /Banner tengah Kecil -->

<!-- Banner bawah -->
<div class="modal fade" id="footer_banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Banner Bawah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   <form action="{{route('admin.setting.update.banner.footer')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="footer_banner" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar Sebelumnya</label>
                            <div class="col-sm-10">
                                <img src="{{ asset($setting->footer_banner) }}" alt="img" class="img-fluid">
                            </div>
                        </div>

                        
                        <hr>
                        <div class="float-right">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>


                             <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                    
                </div>
        </div>
        </div>
    </div>
<!--  /Banner bawah -->

<!-- Carousel 1 -->
<div class="modal fade" id="carousel_img1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Carousel Satu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   <form action="{{route('admin.setting.update.carousel.satu')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="carousel_img1" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar Sebelumnya</label>
                            <div class="col-sm-10">
                                <img src="{{ asset($setting->carousel_img1) }}" alt="img" class="img-fluid">
                            </div>
                        </div>

                        
                        <hr>
                        <div class="float-right">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>


                             <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                    
                </div>
        </div>
        </div>
    </div>
<!--  /Carousel 1 -->

<!-- Carousel 2 -->
<div class="modal fade" id="carousel_img2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Carousel Dua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   <form action="{{route('admin.setting.update.carousel.dua')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="carousel_img2" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar Sebelumnya</label>
                            <div class="col-sm-10">
                                <img src="{{ asset( $setting->carousel_img2 ) }}" alt="img" class="img-fluid">
                            </div>
                        </div>

                        
                        <hr>
                        <div class="float-right">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>


                             <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                    
                </div>
        </div>
        </div>
    </div>
<!--  /Carousel 2 -->

<!-- Carousel 3 -->
<div class="modal fade" id="carousel_img3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Carousel Tiga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   <form action="{{route('admin.setting.update.carousel.tiga')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="carousel_img3" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Gambar Sebelumnya</label>
                            <div class="col-sm-10">
                                <img src="{{ asset( $setting->carousel_img3 ) }}" alt="img" class="img-fluid">
                            </div>
                        </div>

                        
                        <hr>
                        <div class="float-right">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>


                             <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                    
                </div>
        </div>
        </div>
    </div>
<!--  /Carousel 3 -->

@endsection
