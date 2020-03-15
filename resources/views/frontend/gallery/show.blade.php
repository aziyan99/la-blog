
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/photo-swipe/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/photo-swipe/default-skin/default-skin.css') }}">
    <title>Galeri</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .banner {
            margin: 0;
            height: 50vh;
            display: flex;
        }

        .banner-footer {
            margin: 0;
            height: 15vh;
            display: flex;
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

        .fa-youtube {
            background: #bb0000;
            color: white;
        }

        .fa-instagram {
            background: #125688;
            color: white;
        }
    </style>
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v6.0"></script>
    <div class="banner">
        <img src="{{ asset('assets/banners') . '/' . $setting->top_banner }}" alt="img" class="img-fluid">
    </div>
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
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{route('post.semua')}}">Berita & Artikel</a>
                </li>
                <li class="nav-item active mr-5">
                    <a class="nav-link" href="{{ route('depan.galeri.index') }}">Galeri <span class="sr-only">(current)</span></a>
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

                  @foreach($gallery->photos as $photo)
                    <div class="col-lg-12 cl-md-12 col-sm-12 mt-3">
                        <img src="{{ asset('assets/gallery/') . '/' . $photo->photo }}" alt="img" class="img-fluid">
                    </div>
                  @endforeach
                    
                </div>



                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                    <!-- Background of PhotoSwipe. 
                         It's a separate element as animating opacity is faster than rgba(). -->
                    <div class="pswp__bg"></div>

                    <!-- Slides wrapper with overflow:hidden. -->
                    <div class="pswp__scroll-wrap">

                        <!-- Container that holds slides. 
                            PhotoSwipe keeps only 3 of them in the DOM to save memory.
                            Don't modify these 3 pswp__item elements, data is added later on. -->
                        <div class="pswp__container">
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                        </div>

                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                        <div class="pswp__ui pswp__ui--hidden">

                            <div class="pswp__top-bar">

                                <!--  Controls are self-explanatory. Order can be changed. -->

                                <div class="pswp__counter"></div>

                                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                                <button class="pswp__button pswp__button--share" title="Share"></button>

                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                                <!-- element will get class pswp__preloader--active when preloader is running -->
                                <div class="pswp__preloader">
                                    <div class="pswp__preloader__icn">
                                      <div class="pswp__preloader__cut">
                                        <div class="pswp__preloader__donut"></div>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip"></div> 
                            </div>

                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                            </button>

                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                            </button>

                            <div class="pswp__caption">
                                <div class="pswp__caption__center"></div>
                            </div>

                        </div>

                    </div>

                </div>



                <!-- Root element of PhotoSwipe. Must have class pswp. -->


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
    <script src="{{ asset('assets/frontend/plugins/photo-swipe/photoswipe.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/photo-swipe/photoswipe-ui-default.min.js') }}"></script>
    <script>
        var pswpElement = document.querySelectorAll('.pswp')[0];

        // build items array
        var items = [
            @foreach($gallery->photos as $data)
                {
                    src: '{{ asset('assets/gallery/') . '/' . $data->photo }}',
                    w: 600, 
                    h: 400
                },
            @endforeach
        ];

        // define options (if needed)
        var options = {
            // optionName: 'option value'
            // for example:
            index: 0 // start at first slide
        };

        // Initializes and opens PhotoSwipe
        var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    </script>
</body>

</html>