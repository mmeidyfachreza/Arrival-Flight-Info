<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('template/vendor/bootstrap/css2/bootstrap.min.css')}}">
</head>
<body>
    <body>
        <div class="container-fluid px-3">
          <div class="row min-vh-100">
            <div class="col-md-5 col-lg-6 col-xl-4 px-lg-5 d-flex align-items-center">
              <div class="w-100 py-5">
                <div class="text-center"><img src="img/brand/brand-1.svg" alt="..." style="max-width: 6rem;" class="img-fluid mb-4">
                  <h1 class="display-4 mb-3">Sign in</h1>
                </div>
                <form class="form-validate" method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group">
                    <label>Email Address</label>
                    <input name="email" type="email" placeholder="name@address.com" autocomplete="off" required data-msg="Please enter your email" class="form-control">
                  </div>
                  <div class="form-group mb-4">
                    <div class="row">
                      <div class="col">
                        <label>Password</label>
                      </div>
                      <div class="col-auto"><a href="#" class="form-text small text-muted">Forgot password?</a></div>
                    </div>
                    <input name="password" placeholder="Password" type="password" required data-msg="Please enter your password" class="form-control">
                  </div>
                  <!-- Submit-->
                  <button class="btn btn-lg btn-block btn-primary mb-3">Sign in</button>
                  <!-- Link-->
                  <p class="text-center"><small class="text-muted text-center">Don't have an account yet? <a href="register-2.html">Register</a>.</small></p>
                </form>
              </div>
            </div>
            <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
              <!-- Image-->
              <div style="background-image: url(template/img/victor-ene-1301123-unsplash.jpg);" class="bg-cover h-100 mr-n3"></div>
            </div>
          </div>
        </div>
      </body>
</body>
</html>
