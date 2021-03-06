
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($setting->logo) }}" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .fa {
            padding: 10px;
            font-size: 20px;
            width: 50px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-whatsapp {
            background: #25D366;
            color: white;
        }

        .fa-instagram {
            background: #125688;
            color: white;
        }
    </style>
</head>

<body class="container-fluid" style="margin:0; padding:0;">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v6.0"></script>
    <div>
        <img src="{{ asset( $setting->top_banner ) }}" alt="img" class="img-fluid" style="height:350px; width:100%;">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand mr-5" href="{{route('index')}}"><i class="fi-xnluxl-home-solid"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::segment(1) == null ? 'active' : ''}} mr-5">
                    <a class="nav-link" href="{{route('index')}}">Home {!! Request::segment(1) == null ?'<span class="sr-only">(current)</span>' : '' !!}</a>
                </li>
                <li class="nav-item {{ Request::segment(1) == "profile" ? 'active' : ''}} mr-5">
                    <a class="nav-link" href="{{route('profile')}}">Profile {!! Request::segment(1) == "profile" ?'<span class="sr-only">(current)</span>' : '' !!}</a>
                </li>
                <li class="nav-item {{ Request::segment(1) == "semua-berita-dan-artikel" || Request::segment(1) == "baca" ? 'active' : ''}} mr-5">
                    <a class="nav-link" href="{{route('post.semua')}}">Berita & Artikel {!! Request::segment(1) == "semua-berita-dan-artikel" || Request::segment(1) == "baca" ?'<span class="sr-only">(current)</span>' : '' !!}</a>
                </li>
                <li class="nav-item {{ Request::segment(1) == "semua-galeri" || Request::segment(1) == "galeri" ? 'active' : ''}} mr-5">
                    <a class="nav-link" href="{{ route('depan.galeri.index') }}">Galeri {!! Request::segment(1) == "semua-galeri" || Request::segment(1) == "galeri" ?'<span class="sr-only">(current)</span>' : '' !!}</a>
                </li>
                <li class="nav-item {{ Request::segment(1) == "kontak" ? 'active' : ''}} mr-5">
                    <a class="nav-link" href="{{route('depan.kontak')}}">Pengaduan {!! Request::segment(1) == null ?'<span class="sr-only">(current)</span>' : '' !!}</a>
                </li>
            </ul>
            <div class="float-right">
                <i class="fa fa-search"></i>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                @yield('carousel')
                
                @yield('middle-banner')
                
                @yield('content')
                

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 mt-3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <img src="{{ asset( $setting->side_banner) }}" alt="img" class="img-fluid"
                        style="height:558px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                        <img src="{{ asset( $setting->side_child_banner) }}" alt="img" class="img-fluid" style="height:198px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                        {!! $setting->facebook_fanspage !!}
                    </div>
                </div>
                <div class="d-flex flex-row bd-highlight mt-3">
                    <a href="{{ $setting->facebook }}" class="bd-highlight" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="{{ $setting->twitter }}" class="bd-highlight" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/{{ $setting->youtube }}" class="bd-highlight" target="_blank">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                    <a href="{{ $setting->instagram }}" class="bd-highlight" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-footer mt-5">
        <img src="{{ asset( $setting->footer_banner ) }}" alt="img" class="img-fluid" style="height:104px; width:100%;">
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets') }}/frontend/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/plugins/popper/popper.min.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/bootstrap.min.js"></script>
    <script defer src="https://friconix.com/cdn/friconix.js"> </script>
</body>

</html>