<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $setting->system_name }}</title>
    <link href="{{ asset('assets/backend/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <link rel="stylesheet" href="{{asset('assets/backend/plugins/toastr/toastr.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="javascript:;">{{ $setting->system_name }}</a><button
            class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Cari" aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{route('admin.profile')}}">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu Utama</div>
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{route('index')}}" target="_blank">
                            <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                            Home
                        </a>
                        <a class="nav-link collapsed" href="javascript:;" id="atasC" data-toggle="collapse"
                            data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-newspaper"></i></div>
                            Berita dan Artikel
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="{{route('post.create')}}">Tambah</a>
                                <a class="nav-link" id="posts" href="{{route('post.index')}}">Semua Berita</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{route('kategori.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                            Kategori
                        </a>

                        <div class="sb-sidenav-menu-heading">Galeri dan Gambar</div>
                        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse"
                            data-target="#galleryPhotos" aria-expanded="false" aria-controls="galleryPhotos">
                            <div class="sb-nav-link-icon"><i class="fa fa-image"></i></div>
                            Galeri
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="galleryPhotos" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="{{route('galeri.create')}}">Tambah</a>
                                <a class="nav-link" href="{{route('galeri.index')}}">Semua Galeri</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Tambahan</div>
                        <a class="nav-link" href="{{route('admin.pesan.index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-envelope"></i></div>
                            Pesan
                        </a>
                        <a class="nav-link" href="{{route('admin.settings')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                            Pengaturan
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    @yield('breadcump')
                    @yield('content')
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; {{$setting->system_name}}</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/backend/js/scripts.js')}}"></script>

    <script src="{{asset('assets/backend/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/sweetalert/main.js')}}"></script>

    {!! Toastr::message() !!}
    @include('sweetalert::alert')

</body>

</html>
