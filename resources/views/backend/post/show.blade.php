@extends('layouts.backend.master')

@section('breadcump')
<h1 class="mt-4">Lihat Artikel & Berita</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Lihat Artikel & Berita</li>
</ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{route('post.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="text-center">{{ $post->title }}</h3>
                    <span class="badge badge-success">{{ $post->category->category_name }}</span>
                    <span class="badge badge-info">{{ $post->created_at }}</span>
                    <br>
                    <br>
                    <img src="{{ asset('assets/images') . "/" . $post->image }}" alt="img" class="img-fluid">
                    <br>
                    <br>
                    {!! ($post->post) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
