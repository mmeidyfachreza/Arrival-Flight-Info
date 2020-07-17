@extends('admin.layout')

@section('content2')
<!-- Portfolio Section-->
<section>
    <div class="container-fluid">
        <!-- Page Header-->
        <header class="text-center mb-4">
            <h2 class="lined text-uppercase mb-5">Data Prediksi</h2>
            
        </header>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float:left"></h4>
                        <div style="float:right">
                            <a href="{{route('prediksi.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Maskapai</th>
                                        <th class="text-center">Tujuan</th>
                                        <th class="text-center">Pesawat</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x=1;?>
                                    @foreach ($forecast as $item)
                                    <tr>
                                        <td class="text-center">{{$x++}}</td>
                                        <td class="text-center">{{date('F', strtotime($item->date))}}</td>
                                        <td class="text-center">{{$item->airline->name}}</td>
                                        <td class="text-center">{{$item->airplane->destination}}</td>
                                        <td class="text-center">{{$item->airplane->code}}</td>
                                        <td class="text-center">
                                            <a href={{route("forecast.detail",$item->id)}} class="btn btn-warning btn-sm">Lihat Jadwal</i></a>
                                <a href={{route("forecast.detail",$item->id)}} class="btn btn-primary btn-sm">Lihat Prediksi</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
