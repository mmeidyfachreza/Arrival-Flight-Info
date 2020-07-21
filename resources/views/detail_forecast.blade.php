@extends('layouts.layout')

@section('content')
<!-- Hero Section-->

<section id="intro" style="background: url(img/startup-room.jpg)" class="hero bg-cover">
    <div class="overlay"></div>
    <div class="content h-100 d-flex align-items-center">
        <div class="container text-center text-white">
            <p class="headings-font-family text-uppercase lead">Selamat Datang di website kami</p>
            <h1 class="text-uppercase hero-text text-white">Jadwal<span
                    class="font-weight-bold d-block">Kedatangan</span>
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
        <div class="container"><a href="{{url('/')}}" class="navbar-brand py-1"><img
                    src="{{asset('template/img/logo.jpg')}}" alt="asd" class="img-fluid"></a>
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
                    <li class="nav-item"><a href="{{url('/admin')}}"
                            class="nav-link text-uppercase link-scroll">Admin</a></li>
                    <li class="nav-item"><a href="{{route('logout')}}" class="nav-link text-uppercase link-scroll"
                            onclick="event.preventDefault();
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
            <h2 class="lined text-uppercase">Perkiraan 11 periode kedepan</h2>
        </header>
        <br>
    </div>
    <br>
    <div class="bg-white mb-4 p-4" style="width: 100%">
        <div class="card sales-report">
            <div class="line-chart card-body">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>

    </div>
</section>

@endsection

@section('custom-script')
<script type="text/javascript">
    $(document).ready(function () {
        var LINECHART = $('#lineChart');
        $.ajax({
            url: window.location.href,
            //url: "https://sikeswav2.herokuapp.com/admin",
            method: "GET",
            success: function (data) {
                console.log(data)
                var prediksi = [];

                var myLineChart = new Chart(LINECHART, {
                    type: 'bar',
                    options: {
                        legend: {
                            display: false
                        }
                    },
                    data: {
                        labels: ["periode 1", "periode 2", "periode 3", "periode 4",
                            "periode 5", "periode 6", "periode 7", "periode 8",
                            "periode 9", "periode 10", "periode 11"
                        ],
                        datasets: [{
                            label: "Menit",
                            fill: true,
                            lineTension: 0.3,
                            backgroundColor: "rgba(75,192,192,0.4)",
                            borderColor: "rgba(75,192,192,1)",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBorderColor: "rgba(75,192,192,1)",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(75,192,192,1)",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: data,
                            spanGaps: false,
                        }]
                    }
                });
            }
        });
    });

</script>

@endsection
