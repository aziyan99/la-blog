@extends('layouts.frontend.master')

@section('content')
<div class="row mt-3">

    @foreach($galleries as $gallery)
     <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
         <div class="card">
             @foreach($gallery->photos as $photo)
                 <img class="card-img-top" src="{{ asset('assets/gallery/') . '/' . $photo->photo }}" alt="img">

                 @if($loop->iteration == 1)
                     @break
                 @endif
             @endforeach
             <div class="card-body">
                 <h5 class="card-title">{{ $gallery->gallery_name }}</h5>
                 
                 <a href="{{ route('depan.galeri.show', $gallery->id) }}" class="btn btn-success"><i class="fi-xnluxl-camera"></i>&nbsp;&nbsp;Lihat</a>
             </div>
         </div>
     </div>
    @endforeach
     
 </div>
 <div class="row mt-3">
     {{ $galleries->links('vendor.pagination.bootstrap-4') }}
 </div>

@endsection