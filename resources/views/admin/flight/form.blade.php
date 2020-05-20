@extends('admin.layout')

@section('content')
<header class="header sticky-top">
    <nav class="navbar navbar-expand-lg bg-white border-bottom py-0">
        <div class="container"><a href="#" class="navbar-brand py-1"><img src="img/logo.png" alt=""
                    class="img-fluid"></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler navbar-toggler-right"><span class="fas fa-bars"></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto px-3">
                    <li class="nav-item active"><a href="#intro" class="nav-link text-uppercase link-scroll">Home </a>
                    </li>
                    <li class="nav-item"><a href="#about" class="nav-link text-uppercase link-scroll">Jadwal</a></li>
                    <li class="nav-item"><a href="#services" class="nav-link text-uppercase link-scroll">Tujuan</a>
                    </li>
                    <li class="nav-item"><a href="#portfolio" class="nav-link text-uppercase link-scroll">Maskapai</a>
                    </li>
                    <li class="nav-item"><a href="#portfolio" class="nav-link text-uppercase link-scroll">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section id="contact">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="text-uppercase lined">Jadwal</h2>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('status.store')}}" method="POST" class="contact-form">
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
                            <input type="datetime-local" name="arrival" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Actual *</label>
                            <input type="datetime-local" name="actual" class="form-control">
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
