@extends('layouts.layout')

@section('content')
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
  <!-- Portfolio Section-->
  <section id="id" class="pb-0">
    <header class="text-center mb-4">
      <h2 class="lined text-uppercase mb-5">Jadwal</h2>
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
@endsection
