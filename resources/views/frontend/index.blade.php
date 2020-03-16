@extends('layouts.frontend.master')

@section('carousel')
<div class="row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/banners') . '/' . $setting->carousel_img1 }}" class="d-block w-100" alt="img">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/banners') . '/' . $setting->carousel_img2 }}" class="d-block w-100" alt="img">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/banners') . '/' . $setting->carousel_img3 }}" class="d-block w-100" alt="img">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@endsection

@section('middle-banner')
<div class="row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <img src="{{ asset('assets/banners') . '/' . $setting->middle_banner }}" alt="img" class="img-fluid"
        style="height:104px; width:100%;">
    </div>
</div>
@endsection

@section('content')
<div class="row mt-3">

    @foreach($posts as $post)
    <div class="col-lg-6 col-md-6 col-sm-6  mt-3">
        <div class="card">
            <img src="{{ asset('assets/images') . '/' . $post->image }}" class="card-img-top" alt="img">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('baca.post', $post->slug) }}">{{ $post->title }}</a></h5>
                <span class="badge badge-secondary">{{ $post->category->category_name }}</span>
                <p class="card-text">{!! Str::limit($post->post, 80) !!}</p>
                <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection