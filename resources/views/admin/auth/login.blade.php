<!DOCTYPE html>
<html lang="en">

<head>
  <title>Waggy Pet Shop - Admin Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Montserrat:wght@300;400;500&display=swap"
    rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
</head>

<body>
  <section id="admin-login" style="background: url('images/background-img.png') no-repeat; background-size: cover;">
    <div class="container">
      <div class="row my-5 py-5">
        <div class="offset-md-3 col-md-6 my-5">


          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />

          <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
              <x-text-input id="email" class="form-control form-control-lg" type="email" 
                placeholder="Enter Your Email Address" style="font-family: Chilanka,cursive" name="email" :value="old('email')" required autofocus autocomplete="username" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
              <x-text-input id="password" class="form-control form-control-lg"
                type="password" name="password" style="font-family: Chilanka,cursive"
                placeholder="Enter Password" required autocomplete="current-password" />
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mb-4" style="color:black">
              <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-black">{{ __('Remember me') }}</span>
              </label>
            </div>

            <!-- Login Button -->
            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="btn btn-dark btn-lg rounded-1 w-100" style="font-family: Chilanka,cursive">
                {{ __('Log in') }}
              </x-primary-button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="{{ asset('js/plugins.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
