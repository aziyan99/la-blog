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
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                Galeri
                <div class="float-right">
                    <a href="{{route('galeri.create')}}" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Tambah Galeri</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm table-responsive-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Galeri</th>
                            <th width="250">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$gallery->gallery_name}}</td>
                                <td>
                                    <a href="{{route('galeri.edit', $gallery->id)}}" class="d-inline btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Ubah</a>
                                    <a href="javascript:;" class="d-inline btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$gallery->id}}"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@foreach ($galleries as $data)
<div class="modal fade" id="delete{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('galeri.destroy', $data->id) }}" method="POST">
            @csrf 
            <input type="hidden" name="_method" value="DELETE">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Galeri</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">Anda yakin ingin menghapus galeri <b>{{ $data->gallery_name }}</b></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endforeach
@endsection
