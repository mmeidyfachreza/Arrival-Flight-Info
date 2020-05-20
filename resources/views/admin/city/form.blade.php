@extends('admin.layout')

@section('content2')
<section id="contact">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="text-uppercase lined">Kota</h2>
        </header>
        <div class="row">
            <div class="col-lg-12">
                @isset($city)
                <form action="{{route('kota.update',$city->id)}}" method="POST" class="contact-form">
                @method('PUT')
                @else
                <form action="{{route('kota.store')}}" method="POST" class="contact-form">
                @endisset
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Nama *</label>
                            <input type="text" name="name" class="form-control" value="{{old('name', $city->name ?? ' ')}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Kode *</label>
                            <input type="text" name="codename" class="form-control" value="{{old('codename', $city->codename ?? ' ')}}">
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-outline-primary w-100">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
