@extends('layouts.frontend.master')

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
<div class="row mt-3 justify-content-center">
    <div class="col-lg-12 col-md-12 col-sm-12">
        {{ $posts->links() }}
    </div>
</div>
@endsection