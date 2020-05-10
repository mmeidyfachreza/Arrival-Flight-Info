@extends('layouts.layout')

@section('content')
<!-- Hero Section-->
<section id="intro" style="background: url(img/startup-room.jpg)" class="hero bg-cover">
    <div class="overlay"></div>
    <div class="content h-100 d-flex align-items-center">
      <div class="container text-center text-white">
        <p class="headings-font-family text-uppercase lead">Selamat Datang di website kami</p>
        <h1 class="text-uppercase hero-text text-white">We are<span class="font-weight-bold d-block">Agency</span></h1>
        <p class="headings-font-family text-uppercase lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br><a href="#" class="text-white no-anchor-style">meidy.Com</a></p>
      </div>
    </div><a href="#services" class="scroll-btn link-scroll"><i class="fas fa-angle-double-down"></i></a>
  </section>
  <!-- Navbar-->
  <!-- navbar-->
  <header class="header sticky-top">
    <nav class="navbar navbar-expand-lg bg-white border-bottom py-0">
      <div class="container"><a href="#" class="navbar-brand py-1"><img src="img/logo.png" alt="" class="img-fluid"></a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span class="fas fa-bars"></span></button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto px-3">
            <li class="nav-item active"><a href="#intro" class="nav-link text-uppercase link-scroll">Home </a></li>
            <li class="nav-item"><a href="#about" class="nav-link text-uppercase link-scroll">About</a></li>
            <li class="nav-item"><a href="#services" class="nav-link text-uppercase link-scroll">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Services Section-->
  <section id="services" class="bg-gray">
    <div class="container">
      <header class="text-center mb-5">
        <h2 class="lined text-uppercase">Jadwal kedatangan</h2>
      </header>
      <div class="row text-center">
        <div class="col-lg-4">
          <div class="bg-white mb-4 p-4">
            <div class="icon mb-3"><i class="fas fa-plane"></i></div>
            <h4 class="text-uppercase font-weight-bold">Web design</h4>
            <p class="small text-gray">Fifth abundantly made Give sixth hath. Cattle creature i be don't them. </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="bg-white mb-4 p-4">
            <div class="icon mb-3"><i class="fas fa-plane"></i></div>
            <h4 class="text-uppercase font-weight-bold">Citilink - Halim Perdana Kusuma</h4>
            <p class="small text-gray">Fifth abundantly made Give sixth hath. Cattle creature i be don't them. </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="bg-white mb-4 p-4">
            <div class="icon mb-3"><i class="fas fa-plane"></i></div>
            <h4 class="text-uppercase font-weight-bold">Wings - Surabaya</h4>
            <p class="small text-gray">Fifth abundantly made Give sixth hath. Cattle creature i be don't them. </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="bg-white mb-4 p-4">
            <div class="icon mb-3"><i class="fas fa-plane"></i></div>
            <h4 class="text-uppercase font-weight-bold">Wings - Halim Perdana Kusuma</h4>
            <p class="small text-gray">Fifth abundantly made Give sixth hath. Cattle creature i be don't them. </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="bg-white mb-4 p-4">
            <div class="icon mb-3"><i class="fas fa-plane"></i></div>
            <h4 class="text-uppercase font-weight-bold">Wings - Yogyakarta</h4>
            <p class="small text-gray">Fifth abundantly made Give sixth hath. Cattle creature i be don't them. </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="bg-white mb-4 p-4">
            <div class="icon mb-3"><i class="fas fa-plane"></i></div>
            <h4 class="text-uppercase font-weight-bold">Wings - Semarang</h4>
            <p class="small text-gray">Fifth abundantly made Give sixth hath. Cattle creature i be don't them. </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Portfolio Section-->
  @foreach ($destinations as $item1)
  <section id="{{$item1->name}}" class="pb-0">
    <header class="text-center mb-4">
      <h2 class="lined text-uppercase mb-5">{{$item1->name}}</h2>
      <p>tes tes tes</p>
    </header>
        <div class="table-responsive mb-4">
            <table class="table table-striped table-bordered table-condensed ">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Maskapai</th>
                    <th>Kedatangan</th>
                    <th>waktu</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($history as $item2)
                    @if ($item1->id == $item2->destination_id)
                    <tr>
                        <td>{{$item2->date1}}</td>
                        <td>{{$item2->airline->name}}</td>
                        <td>{{$item2->time1}}</td>
                        <td>{{$item2->time2}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
              </table>
        </div>
  </section>
  @endforeach
  <!-- Text Section-->
  <section id="text" class="bg-gray">
    <div class="container">
      <header class="text-center mb-5">
        <h2 class="lined text-uppercase">Text Page</h2>
      </header>
      <div class="row">
        <div class="col-lg-6">
          <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.</p>
        </div>
        <div class="col-lg-6">
          <p>Betrayed cheerful declared end and. Questions we additions is extremely incommode. Next half add call them eat face. Age lived smile six defer bed their few. Had admitting concluded too behaviour him she. Of death to or to being other.</p>
        </div>
        <div class="col-lg-6">
          <p>Effects present letters inquiry no an removed or friends. Desire behind latter me though in. Supposing shameless am he engrossed up additions. My possible peculiar together to. Desire so better am cannot he up before points. Remember mistaken opinions it pleasure of debating. Court front maids forty if aware their at. Chicken use are pressed removed.</p>
        </div>
        <div class="col-lg-6">
          <p>Saw yet kindness too replying whatever marianne. Old sentiments resolution admiration unaffected its mrs literature. Behaviour new set existence dashwoods. It satisfied to mr commanded consisted disposing engrossed. Tall snug do of till on easy. Form not calm new fail.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Team Section-->
@endsection
