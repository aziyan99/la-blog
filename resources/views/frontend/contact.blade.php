@extends('layouts.frontend.master')

@section('content')
<div class="row mt-3">
    <h3>Tak Kenal Maka Tak Sayang</h3>
</div>
<form action="{{ route('depan.kontak.simpan') }}" method="POST">
    @csrf
    <div class="card mt-3">
        <div class="card-body">

            <div class="row mt-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>No Hp/Email</label>
                        <input type="text" name="email_nohp" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea name="pesan"  cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <div class="float-right">
                <button class="btn btn-success" type="submit"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Kirim</button>
            </div>  
            
        </div>
    </div>
</form>
@endsection