@extends('layouts.frontend.master')

@section('content')
<div class="row mt-3">
    <img src="{{ asset( $setting->top_banner ) }}" alt="img" class="img-fluid"style="height:110px; width:100%;">
   
   <h3 class="mt-3 mb-3"><i>Sekapur Sirih</i></h3><br>
   <p>{!! $setting->profile_desc !!}</p>
   
</div>
@endsection