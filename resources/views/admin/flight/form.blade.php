@extends('admin.layout')

@section('content2')
<section id="contact">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="text-uppercase lined">Jadwal</h2>
        </header>
        <div class="row">
            <div class="col-lg-12">
                @isset($status)
                <form action="{{route('status.update',$status->id)}}" method="POST" class="contact-form">
                @method('PUT')
                @else
                <form action="{{route('status.store')}}" method="POST" class="contact-form">
                @endisset
                    @csrf
                    <div class="form-group">
                        <label for="Maskapai">Maskapai *</label>
                            <select name="airline_id" class="custom-select">
                                @isset ($status)
                                @foreach ($airlines as $item)
                                <option value={{$item->id}} @if ($item->id == $status->ariline_id)
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
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Tujuan *</label>
                            <select name="from" class="custom-select">
                                @isset ($status)
                                @foreach ($cities as $item)
                                <option value={{$item->id}} @if ($item->id == $status->from)
                                    selected
                                    @endif>{{$item->name}}</option>
                                @endforeach
                                @else
                                <option value='' selected disabled>--Pilih Tujuan--</option>
                                @foreach ($cities as $item)
                                <option value={{$item->id}}>{{$item->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Tujuan *</label>
                            <select name="to" class="custom-select">
                                @isset ($status)
                                @foreach ($cities as $item)
                                <option value={{$item->id}} @if ($item->id == $status->to)
                                    selected
                                    @endif>{{$item->name}}</option>
                                @endforeach
                                @else
                                <option value='' selected disabled>--Pilih Tujuan--</option>
                                @foreach ($cities as $item)
                                <option value={{$item->id}}>{{$item->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>kedatangan *</label>
                            <input type="datetime-local" name="arrival" class="form-control" value="{{date('Y-m-d\TH:i', strtotime($status->arrival ?? ' '))}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Actual *</label>
                            <input type="datetime-local" name="actual" class="form-control" value="{{date('Y-m-d\TH:i', strtotime($status->actual ?? ' '))}}">
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
