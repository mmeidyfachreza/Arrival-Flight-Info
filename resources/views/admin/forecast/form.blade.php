@extends('admin.layout')

@section('content2')
<section id="contact">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="text-uppercase lined">Prediksi</h2>
        </header>
        <div class="row">
            <div class="col-lg-12">
                @isset($forecast)
                <form action="{{route('prediksi.update',$forecast->id)}}" method="POST" class="contact-form" enctype="multipart/form-data">
                @method('PUT')
                @else
                <form action="{{route('prediksi.store')}}" method="POST" class="contact-form" enctype="multipart/form-data">
                @endisset
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="Maskapai">Maskapai *</label>
                            <select name="airline_id" class="custom-select">
                                @isset ($forecast)
                                @foreach ($airlines as $item)
                                <option value={{$item->id}} @if ($item->id == $forecast->ariline_id)
                                    selected
                                    @endif>{{$item->name}}</option>
                                @endforeach
                                @else
                                <option value='' selected disabled>--Pilih Maskapai--</option>
                                @foreach ($airlines as $item)
                                <option value={{$item->id}}>{{$item->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Pesawat *</label>
                            <select name="airplane_id" class="custom-select">
                                @isset ($forecast)
                                @foreach ($airplanes as $item)
                                <option value={{$item->id}} @if ($item->id == $forecast->airplane_id)
                                    selected
                                    @endif>{{$item->code}} {{$item->destination}}</option>
                                @endforeach
                                @else
                                <option value='' selected disabled>--Pilih Tujuan--</option>
                                @foreach ($airplanes as $item)
                                <option value={{$item->id}}>{{$item->code}} {{$item->destination}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Bulan *</label>
                            <input type="month" name="date" class="form-control" value="{{date('Y-m', strtotime($forecast->date ?? ' '))}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Excel *</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="row">
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
