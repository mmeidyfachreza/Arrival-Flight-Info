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
                    <li class="nav-item"><a href="{{route('list.prediksi')}}" class="nav-link text-uppercase link-scroll">Prediksi</a></li>
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

            <div class="card">
                <div class="card-body">
                    <form action="{{route('search.flight')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select class="select-dari form-control"
                                        name="from" style="width: 100%"></select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select class="select-tujuan form-control" style="width: 100%"
                                        name="to"></select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="date" name="date" placeholder="Masukan Nomor Induk Siswa"
                                        class="form-control"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @isset ($search)
                            <div class="form-group col-lg-6 text-center">
                                <button type="Cari" class="btn btn-outline-primary w-100">Cari</button>
                            </div>
                            <div class="form-group col-lg-6 text-center">
                                <a href="{{url('/')}}" class="btn btn-outline-danger w-100">Ulang</a>
                            </div>
                            @else
                            <div class="form-group col-lg-12 text-center">
                                <button type="Cari" class="btn btn-outline-primary w-100">Cari</button>
                            </div>
                            @endif

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <br>
    <div class="bg-white mb-4 p-4" style="width: 100%">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center">Airplane</th>
                        <th class="text-center">From</th>
                        <th class="text-center">To</th>
                        <th class="text-center">Arrival</th>
                        <th class="text-center">Actual</th>
                        <th class="text-center">Status</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $x=1;?>
                    @foreach ($status as $item)
                    <tr>
                        <td class="text-center">{{date('d-m-Y', strtotime($item->arrival ?? ' ')) ?? 'tidak diketahui'}}</td>
                        <td class="text-center">{{$item->airplane->code}}</td>
                        <td class="text-center">{{$item->fromCity->name}}</td>
                        <td class="text-center">{{$item->toCity->name}}</td>
                        <td class="text-center">{{date('d-m-Y H:i:s', strtotime($item->arrival ?? ' ')) ?? 'tidak diketahui'}}</td>
                        <td class="text-center">{{date('d-m-Y H:i:s', strtotime($item->actual ?? ' ')) ?? 'tidak diketahui'}}</td>
                        <td class="text-center">Delay {{$item->delay ?? 0}} menit</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @foreach ($status as $data)
    <div class="bg-white mb-4 p-4" style="width: 100%">
        <div class="row">
            <div class="col-lg-3">
                <div class="icon mb-3"><i class="fas fa-plane"></i></div>
                <h5 class="text-uppercase font-weight-bold">{{$data->airline->name}}</h4>
            </div>
            <div class="col-lg-2">
                <h5 class="text-uppercase font-weight-bold">27-23-2020</h4>
                <p class="small text-gray">Tanggal</p>
            </div>
            <div class="col-lg-2">
            <h4 class="text-uppercase font-weight-bold">{{$data->fromCity->name}}</h4>
            </div>
            <div class="col-lg-2">
                <h4 class="text-uppercase font-weight-bold">{{$data->toCity->name}}</h4>
            </div>
            <div class="col-lg-3">
                <h5 class="text-uppercase font-weight-bold">5 menit</h4>
                <p class="small text-gray">Keterangan Delay</p>
            </div>
        </div>
    </div>
    @endforeach --}}
</div>
</section>
<!-- Text Section-->
<section id="about">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="lined text-uppercase">Text Page</h2>
        </header>
        <div class="row">
            <div class="col-lg-6">
                <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own
                    additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed
                    saw man led. Along on happy could cease green oh.</p>
            </div>
            <div class="col-lg-6">
                <p>Betrayed cheerful declared end and. Questions we additions is extremely incommode. Next half add call
                    them eat face. Age lived smile six defer bed their few. Had admitting concluded too behaviour him
                    she. Of death to or to being other.</p>
            </div>
            <div class="col-lg-6">
                <p>Effects present letters inquiry no an removed or friends. Desire behind latter me though in.
                    Supposing shameless am he engrossed up additions. My possible peculiar together to. Desire so better
                    am cannot he up before points. Remember mistaken opinions it pleasure of debating. Court front maids
                    forty if aware their at. Chicken use are pressed removed.</p>
            </div>
            <div class="col-lg-6">
                <p>Saw yet kindness too replying whatever marianne. Old sentiments resolution admiration unaffected its
                    mrs literature. Behaviour new set existence dashwoods. It satisfied to mr commanded consisted
                    disposing engrossed. Tall snug do of till on easy. Form not calm new fail.</p>
            </div>
        </div>
    </div>
</section>
<!-- Team Section-->
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
