@extends('layouts.frontend.master')

@section('content')
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
@endsection