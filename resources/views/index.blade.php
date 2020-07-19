@extends('layouts.layout')

@section('content')
<!-- Hero Section-->

<section id="intro" style="background: url(img/startup-room.jpg)" class="hero bg-cover">
    <div class="overlay"></div>
    <div class="content h-100 d-flex align-items-center">
        <div class="container text-center text-white">
            <p class="headings-font-family text-uppercase lead">Selamat Datang di website kami</p>
            <h1 class="text-uppercase hero-text text-white">Jadwal<span class="font-weight-bold d-block">Kedatangan</span>
            </h1>
            <p class="headings-font-family text-uppercase lead">
                <br><a href="#" class="text-white no-anchor-style"> </a></p>
        </div>
    </div><a href="#status" class="scroll-btn link-scroll"><i class="fas fa-angle-double-down"></i></a>
</section>
<!-- Navbar-->
<!-- navbar-->
<header class="header sticky-top">
    <nav class="navbar navbar-expand-lg bg-white border-bottom py-0">
        <div class="container"><a href="{{url('/')}}" class="navbar-brand py-1"><img src="{{asset('template/img/logo.jpg')}}" alt="asd"
                    class="img-fluid"></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler navbar-toggler-right"><span class="fas fa-bars"></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto px-3">
                    <li class="nav-item active"><a href="#intro" class="nav-link text-uppercase link-scroll">Home </a>
                    </li>
                    <li class="nav-item"><a href="#about" class="nav-link text-uppercase link-scroll">About</a></li>
                    @guest
                    <li class="nav-item"><a href="{{route('login')}}"
                        class="nav-link text-uppercase link-scroll">Login</a></li>
                    @else
                    <li class="nav-item"><a href="{{url('/admin')}}" class="nav-link text-uppercase link-scroll">Admin</a></li>
                    <li class="nav-item"><a href="{{route('logout')}}"
                        class="nav-link text-uppercase link-scroll" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Services Section-->
<section id="status" class="bg-gray">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="lined text-uppercase">Jadwal kedatangan</h2>
        </header>
        <br>
        <div style="">

        </div>

    </div>
    <br>
    <div class="bg-white mb-4 p-4" style="width: 100%">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Bulan</th>
                        <th class="text-center">Maskapai</th>
                        <th class="text-center">Tujuan</th>
                        <th class="text-center">Pesawat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $x=1;?>
                    @foreach ($forecast as $item)
                    <tr>
                        <td class="text-center">{{$x++}}</td>
                        <td class="text-center">{{date('F', strtotime($item->date))}}</td>
                        <td class="text-center">{{$item->airline->name}}</td>
                        <td class="text-center">{{$item->airplane->destination}}</td>
                        <td class="text-center">{{$item->airplane->code}}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href={{route("forecast.detail",$item->id)}} class="btn btn-warning btn-sm">Lihat Jadwal</i></a>
                                <a href={{route("forecast.detail",$item->id)}} class="btn btn-primary btn-sm">Lihat Prediksi</i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>


@endsection

@section('custom-script')
<script type="text/javascript">
    $(document).ready(function () {
        $('.select-dari').select2({
            placeholder: 'Dari...',
            ajax: {
                url: '/cari',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('.select-tujuan').select2({
            placeholder: 'Tujuan...',
            ajax: {
                url: '/cari',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    });
</script>

@endsection
