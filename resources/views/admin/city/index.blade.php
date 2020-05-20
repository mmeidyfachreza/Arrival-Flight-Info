@extends('admin.layout')

@section('content2')
<!-- Portfolio Section-->
<section>
    <div class="container-fluid">
        <!-- Page Header-->
        <header class="text-center mb-4">
            <h2 class="lined text-uppercase mb-5">Kota</h2>
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
                            <a href="{{route('kota.create')}}" class="btn btn-primary btn-sm">Tambah</a>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x=1;?>
                                    @foreach ($cities as $item)
                                    <tr>
                                        <td>{{$x++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->codename}}</td>
                                        <td>
                                            <form action="{{ route('kota.destroy',$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Apakah anda yakin?')"
                                                    class="btn btn-danger btn-sm"><i
                                                        class="far fa-trash-alt"></i></button>

                                                <a href="{{route('kota.edit',$item->id)}}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('kota.show',$item->id)}}"
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
