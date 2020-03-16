@extends('layouts.frontend.master')

@section('content')
<div class="row mt-3">
    <img src="{{ asset('assets/banners') . '/' . $setting->top_banner }}" alt="img" class="img-fluid">
   
   <h3 class="mt-3 mb-3"><i>Sekapur Sirih</i></h3><br>
   <p>{!! $setting->profile_desc !!}</p>
   
</div>
@endsection