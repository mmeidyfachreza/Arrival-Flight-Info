@extends('admin.layout')

@section('content2')
<section id="contact">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="text-uppercase lined">Pesawat</h2>
        </header>
        <div class="row">
            <div class="col-lg-12">
                @isset($airplane)
                <form action="{{route('pesawat.update',$airplane->id)}}" method="POST" class="contact-form">
                @method('PUT')
                @else
                <form action="{{route('pesawat.store')}}" method="POST" class="contact-form">
                @endisset
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Nama *</label>
                            <input type="text" name="code" class="form-control" value="{{old('code', $airplane->name ?? ' ')}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Tujuan *</label>
                            <select name="destination" class="custom-select">
                                @isset ($airplane)
                                @foreach ($cities as $item)
                                <option value={{$item->name}} @if ($item->name == $status->destination)
                                    selected
                                    @endif>{{$item->name}}</option>
                                @endforeach
                                @else
                                <option value='' selected disabled>--Pilih Tujuan--</option>
                                @foreach ($cities as $item)
                                <option value={{$item->name}}>{{$item->name}}</option>
                                @endforeach
                                @endisset
                            </select>
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
