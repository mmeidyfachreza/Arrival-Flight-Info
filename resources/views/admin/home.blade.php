@extends('admin.layout')

@section('content2')
<!-- statuses Section-->
<section>
    <div class="container-fluid">
        <!-- Page Header-->
        <header class="text-center mb-4">
            <h2 class="lined text-uppercase mb-5">Status Penerbangan</h2>
            <p>tes tes tes</p>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float:left"></h4>
                        <div style="float:right">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Pesawat</th>
                                        <th>Dari</th>
                                        <th>Tujuan</th>
                                        <th>Kedatangan</th>
                                        <th>Actual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x=1;?>
                                    @foreach ($status as $item)
                                    <tr>
                                        <td>{{$x++}}</td>
                                        <td>{{date('Y-m-d', strtotime($item->arrival ?? ' ')) ?? 'tidak diketahui'}}</td>
                                        <td>{{$item->airplane->code}}</td>
                                        <td>{{$item->fromCity->name}}</td>
                                        <td>{{$item->toCity->name}}</td>
                                        <td>{{$item->arrival}}</td>
                                        <td>{{$item->actual}}</td>
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
<!-- cities Section-->
<section class="bg-gray">
    <div class="container-fluid">
        <!-- Page Header-->
        <header class="text-center mb-4">
            <h2 class="lined text-uppercase mb-5">List Kota</h2>
            <p>tes tes tes</p>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float:left"></h4>
                        <div style="float:right">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x=1;?>
                                    @foreach ($cities as $item)
                                    <tr>
                                        <td>{{$x++}}</td>
                                        <td>{{$item->name ?? 'tidak diketahui'}}</td>
                                        <td>{{$item->codename ?? 'tidak diketahui'}}</td>
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
<!-- airlines Section-->
<section>
    <div class="container-fluid">
        <!-- Page Header-->
        <header class="text-center mb-4">
            <h2 class="lined text-uppercase mb-5">List Maskapai</h2>
            <p>tes tes tes</p>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float:left"></h4>
                        <div style="float:right">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x=1;?>
                                    @foreach ($airlines as $item)
                                    <tr>
                                        <td>{{$x++}}</td>
                                        <td>{{$item->name ?? 'tidak diketahui'}}</td>
                                        <td>{{$item->codename ?? 'tidak diketahui'}}</td>
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
