@extends('layouts.backend.master')

@section('breadcump')
<h1 class="mt-4">Berita & Artikel</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Berita & Artikel</li>
</ol>
@endsection

@section('content')

<link href="{{asset('assets/backend/plugins/datatables/datatables.min.css')}}" rel="stylesheet"/>
<script src="{{asset('assets/backend/plugins/datatables/datatables.min.js')}}"></script>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{route('post.create')}}" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Tambah Berita dan Postingan</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm table-responsive-sm" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal Dibuat</th>
                                <th width="250">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td><span class="badge badge-secondary">{{ $post->category->category_name }}</span></td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a href="{{ route('post.show', $post->slug) }}" class="btn btn-info btn-sm d-inline"><i class="fa fa-eye"></i>&nbsp;Lihat</a>
                                        <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-warning btn-sm d-inline"><i class="fa fa-edit"></i>&nbsp;Ubah</a>
                                        <a href="javascirpt:;" class="btn btn-sm btn-danger d-inline" data-toggle="modal" data-target="#delete{{$post->id}}"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var del = document.querySelectorAll('delete');
        del.preventDefault;
    </script>

    <script>
        $(document).ready(function(){
            $('#table').DataTable();
        });
    </script>

    <!-- Modal -->
    @foreach ($posts as $data)
    <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('post.destroy', $data->id)}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">Anda yakin ingin menghapus data ini ?</div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
                    </div>
                </div>
        </form>
        </div>
    </div>
    @endforeach
@endsection
