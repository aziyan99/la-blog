@extends('layouts.backend.master')

@section('breadcump')
<h1 class="mt-4">Tambah Artikel & Berita</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Tambah Artikel & Berita</li>
</ol>
@endsection

@section('content')

<script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ Toastr::warning($error, 'Error') }}
    @endforeach
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card">
                    <div class="card-header">
                        <a href="{{route('post.index')}}" class="btn btn-info"><i class="fa fa-list"></i>&nbsp;&nbsp;Semua Artikel & Berita</a>
                        <div class="float-right">
                            <a href="{{route('post.create')}}" class="btn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i>&nbsp;&nbsp;Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Permalink</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="slug" id="slug" value="{{old('slug')}}" readonly>
                                    </div>
                                </div>
                                <script>
                                    $('#title').keyup(function(){
                                        var title = $('#title').val();
                                        var slug = title.replace(/\s+/g, '-').toLowerCase();
                                        $('#slug').val(slug);
                                    });
                                </script>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Post</label>
                                <div class="col-sm-10">
                                    <textarea name="post" id="post" cols="30" rows="10" class="form-control">{{old('post')}}</textarea>

                                <script>
                                    CKEDITOR.replace('post');
                                </script>

                                </div>
                            </div>

                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-4">

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right">Kategori</label>
                                    <div class="col-sm-8">
                                        <select name="category_id" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($category as $data)
                                                <option  value="{{$data->id}}">{{ $data->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right">Gambar</label>
                                    <div class="col-sm-8">
                                       <input type="file" name="image" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
