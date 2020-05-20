@extends('layouts.layout')

@section('content')
  <!-- navbar-->
  <header class="header sticky-top">
    <nav class="navbar navbar-expand-lg bg-white border-bottom py-0">
      <div class="container"><a href="{{url('/')}}" class="navbar-brand py-1"><img src="{{asset('template/img/logo.jpg')}}" alt="" class="img-fluid"></a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span class="fas fa-bars"></span></button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto px-3">
            <li class="nav-item active"><a href="{{url('/admin')}}" class="nav-link text-uppercase link-scroll">Beranda</a>
            </li>
            <li class="nav-item"><a href="{{route('status.index')}}" class="nav-link text-uppercase link-scroll">Status Penerbangan</a></li>
            <li class="nav-item"><a href="{{route('kota.index')}}" class="nav-link text-uppercase link-scroll">Kota</a>
            </li>
            <li class="nav-item"><a href="{{route('maskapai.index')}}" class="nav-link text-uppercase link-scroll">Maskapai</a>
            </li>
            <li class="nav-item"><a href="{{route('logout')}}"
                class="nav-link text-uppercase link-scroll" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Portfolio Section-->
  @yield('content2')
@endsection
