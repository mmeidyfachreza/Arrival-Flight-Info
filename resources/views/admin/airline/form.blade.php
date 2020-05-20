@extends('admin.layout')

@section('content2')
<section id="contact">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="text-uppercase lined">Maskapai</h2>
        </header>
        <div class="row">
            <div class="col-lg-12">
                @isset($airline)
                <form action="{{route('maskapai.update',$airline->id)}}" method="POST" class="contact-form">
                @method('PUT')
                @else
                <form action="{{route('maskapai.store')}}" method="POST" class="contact-form">
                @endisset
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Nama *</label>
                            <input type="text" name="name" class="form-control" value="{{old('name', $airline->name ?? ' ')}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Kode *</label>
                            <input type="text" name="codename" class="form-control" value="{{old('codename', $airline->codename ?? ' ')}}">
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
