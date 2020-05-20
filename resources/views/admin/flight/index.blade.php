@extends('admin.layout')

@section('content2')
<!-- Portfolio Section-->
<section>
    <div class="container-fluid">
        <!-- Page Header-->
        <header class="text-center mb-4">
            <h2 class="lined text-uppercase mb-5">Status Penerbangan</h2>
            <p>tes tes tes</p>
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
                            <a href="{{route('status.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Maskapai</th>
                                        <th>Dari</th>
                                        <th>Tujuan</th>
                                        <th>Arrival</th>
                                        <th>Actual</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x=1;?>
                                    @foreach ($status as $item)
                                    <tr>
                                        <td>{{$x++}}</td>
                                        <td>{{date('Y-m-d', strtotime($item->arrival ?? ' ')) ?? 'tidak diketahui'}}</td>
                                        <td>{{$item->airline->name}}</td>
                                        <td>{{$item->fromCity->name}}</td>
                                        <td>{{$item->toCity->name}}</td>
                                        <td>{{$item->arrival}}</td>
                                        <td>{{$item->actual}}</td>
                                        <td>
                                            <form action="{{ route('status.destroy',$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Apakah anda yakin?')"
                                                    class="btn btn-danger btn-sm"><i
                                                        class="far fa-trash-alt"></i></button>

                                                <a href="{{route('status.edit',$item->id)}}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('status.show',$item->id)}}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                            </form>
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
