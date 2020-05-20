@extends('admin.layout')

@section('content')
<section id="contact">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="text-uppercase lined">Jadwal</h2>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('jadwal.store')}}" method="POST" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="Maskapai">Maskapai *</label>
                            <select name="airline_id" class="custom-select">
                                @isset ($history)
                                @foreach ($airlines as $item)
                                <option value={{$item->id}} @if ($item->id == $history->ariline_id)
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
                            <label for="Tujuan">Tujuan *</label>
                            <select name="destination_id" class="custom-select">
                                @isset ($history)
                                @foreach ($destinations as $item)
                                <option value={{$item->id}} @if ($item->id == $history->destination_id)
                                    selected
                                    @endif>{{$item->name}}</option>
                                @endforeach
                                @else
                                <option value='' selected disabled>--Pilih Tujuan--</option>
                                @foreach ($destinations as $item)
                                <option value={{$item->id}}>{{$item->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Tanggal *</label>
                            <input type="date" name="date1" placeholder="Tanggal Kedatangan"
                                class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Jam *</label>
                            <input type="time" name="time1" placeholder="jam Kedatangan"
                                class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Tanggal Delay *</label>
                            <input type="date" name="date2" placeholder="Tanggal Delay"
                                class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Jam Delay *</label>
                            <input type="time" name="time2" placeholder="Jam Delay"
                                class="form-control">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="flight_type">Jenis Penerbangan *</label>
                            <input  type="text" name="flight_type" placeholder="Jenis Penerbangan"
                                class="form-control">
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
