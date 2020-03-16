@extends('layouts.frontend.master')

@section('content')
<div class="row mt-3">

    <div class="col-lg-12 col-md-12 col-sm-12  mt-3">
      
            
                <h1>{{ $post->title }}</h1>
                <span class="badge badge-secondary">{{ $post->category->category_name }}</span>&nbsp;&nbsp;<span class="badge badge-info">Admin</span> <br>
                <img src="{{ asset($post->image) }}" class="img-fluid mb-3 mt-3" alt="img">
                <p class="text-justify mt-2">
                    {!! $post->post !!}
                </p>
                <p><small class="text-muted">{{ $post->created_at }}</small></p>
           
    </div>
<<<<<<< HEAD
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand mr-5" href="javascript:;"><i class="fi-xnluxl-home-solid"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  mr-5">
                    <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{route('profile')}}">Profile</a>
                </li>
                <li class="nav-item active mr-5">
                    <a class="nav-link" href="{{route('post.semua')}}">Berita & Artikel <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('depan.galeri.index') }}">Galeri</a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{route('depan.kontak')}}">Kontak</a>
                </li>
            </ul>
            <div class="float-right">
                <i class="fi-xwsuxl-update"></i>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                
                <div class="row mt-3">

                    <div class="col-lg-12 col-md-12 col-sm-12  mt-3">
                      
                            
                                <h1>{{ $post->title }}</h1>
                                <span class="badge badge-secondary">{{ $post->category->category_name }}</span>&nbsp;&nbsp;<span class="badge badge-info">Admin</span> <br>
                                <img src="{{ asset('assets/images') . '/' . $post->image }}" class="img-fluid mb-3 mt-3" alt="img">
                                <p class="text-justify mt-2">
                                    {!! $post->post !!}
                                </p>
                                <p><small class="text-muted">{{ $post->created_at }}</small></p>
                           
                    </div>

                    
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 mt-3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <img src="{{ asset('assets/banners') . '/' . $setting->side_banner }}" alt="img" class="img-fluid"
                            style="display: flex; margin: 0; height: 80vh;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                        <img src="{{ asset('assets/banners') . '/' . $setting->side_child_banner }}" alt="img" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                        {!! $setting->facebook_fanspage !!}
                    </div>
                </div>
                <div class="d-flex flex-row bd-highlight mt-3">
                    <a href="{{ $setting->facebook }}" class="bd-highlight">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="{{ $setting->twitter }}" class="bd-highlight">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="{{ $setting->youtube }}" class="bd-highlight">
                        <i class="fa fa-youtube"></i>
                    </a>
                    <a href="{{ $setting->instagram }}" class="bd-highlight">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-footer mt-5">
        <img src="{{ asset('assets/banners') . '/' . $setting->footer_banner }}" alt="img" class="img-fluid">
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets') }}/frontend/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/plugins/popper/popper.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/bootstrap.min.js"></script>
    <script defer src="https://friconix.com/cdn/friconix.js"> </script>
</body>
=======
>>>>>>> hotfix/change-template

    
</div>
@endsection