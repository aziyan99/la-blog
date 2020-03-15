@extends('layouts.backend.master')

@section('breadcump')
<h1 class="mt-4">Galeri</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Galeri</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                Tambah Galeri
                <div class="float-right">
                    <a href="{{route('galeri.index')}}" class="btn btn-info"><i class="fa fa-list"></i>&nbsp;Semua Galeri</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('galeri.store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Nama Galeri</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="gallery_name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
