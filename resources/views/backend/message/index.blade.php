@extends('layouts.backend.master')

@section('breadcump')
<h1 class="mt-4">Pengaturan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pesan</li>
</ol>
@endsection

@section('content')
<link href="{{asset('assets/backend/plugins/datatables/datatables.min.css')}}" rel="stylesheet"/>
<script src="{{asset('assets/backend/plugins/datatables/datatables.min.js')}}"></script>

<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                	Semua Pesan
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm table-responsive-sm" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp/Email</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contact as $data)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $data->nama }}</td>
									<td>{{ $data->email_nohp }}</td>
									<td>{{ $data->pesan }}</td>
									<td>
										<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $data->id }}"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</button>
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
    @foreach($contact as $data)
	<div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	  	<form action="{{ route('admin.pesan.destroy', $data->id) }}" method="POST">
	  		@csrf
	  		<input type="hidden" name="_method" value="DELETE">
	  	
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Hapus Pesan</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Apakah anda yakin ingin menghapus pesan ini ?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
		        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</button>
		      </div>
		    </div>
		</form>
	  </div>
	</div>
	@endforeach

    <script>
        $(document).ready(function(){
            $('#table').DataTable();
        });
    </script>

@endsection