@extends('layouts.backend.master')

@section('breadcump')
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
@endsection

@section('content')
<script src="{{ asset('assets/backend/plugins/chartjs/chart.bundle.js') }}"></script>
<div class="row mt-3">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body text-center"><i class="fa fa-newspaper"></i>&nbsp;&nbsp;Postingan <br> <h5 class="text-center">{{ $countPost }}</h5></div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
             <div class="card-body text-center"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Pesan <br> <h5 class="text-center">{{ $countMessage }}</h5></div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
             <div class="card-body text-center"><i class="fa fa-list"></i>&nbsp;&nbsp;Galeri <br> <h5 class="text-center">{{ $countGallery }}</h5></div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
             <div class="card-body text-center"><i class="fa fa-image"></i>&nbsp;&nbsp;Gambar <br> <h5 class="text-center">{{ $countPhoto }}</h5></div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12 col-sm-12 col-md-12"> 
        <div class="card">
            <div class="card-body"> 
                <canvas id="chart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                Pesan Terbaru
            </div>
            <div class="card-body">
                <table class="
                table table-bordered table-hover table-responsive-sm table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pengirim</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($message as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
var ctx = document.getElementById('chart');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Postingan', 'Pesan', 'Galeri', 'Gambar'],
        datasets: [{
            label: '# of Votes',
            data: [{{ $countPost }}, {{ $countMessage }}, {{ $countGallery }}, {{ $countPhoto }}],
            backgroundColor: [
                'rgb(40,167,69, 0.5)',
                'rgb(108,117,125, 0.5)',
                'rgb(23,162,184, 0.5)',
                'rgb(220,53,69, 0.5)'
            ],
            borderColor: [
                'rgb(40,167,69)',
                'rgb(108,117,125)',
                'rgb(23,162,184)',
                'rgb(220,53,69)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

@endsection
