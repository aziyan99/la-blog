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
    <div class="col-lg-7 col-md-7 col-sm-7">
        <div class="card">
            <div class="card-header">
                Galeri
                <div class="float-right">
                    <a href="{{route('galeri.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                    <a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-images"></i>&nbsp;Tambah Gambar</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm table-responsive-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th width="250">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photos as $photo)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a href="{{asset('assets/gallery') . "/" . $photo->photo}}" target="_blank">
                                        <img src="{{asset('assets/gallery') . "/" . $photo->photo}}" alt="img" class="img-fluid">
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('galeri.photo.delete', $photo->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-5 col-md-5 col-lg-5">
        <div class="card mb-3">
            <div class="card-header">
                Nama Galeri
            </div>
            <div class="card-body">
                <form action="{{route('galeri.update', $gallery->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nama Galeri</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="gallery_name" class="form-control" value="{{$gallery->gallery_name}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 text-right">
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Ubah</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="{{route('galeri.photo.store', $gallery->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="photo" required>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
            </div>
        </form>
    </div>
    </div>
  </div>

@endsection
