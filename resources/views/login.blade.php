<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum Cloud | Masuk</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{asset('./css/style.min.css')}}">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
  <div class="layer"></div>
<main class="page-center">
  @if (session('info'))
    <x-alert-info :message="session('info')" /> 
  @endif
  @if ($errors->any())
    <x-alert-danger :errors="$errors->all()" />
  @endif
  <article class="sign-up">
    <a href="/" class="sign-up__title text-decoration-none navbar-brand fs-1">Forum-Cloud</a>
    <p class="sign-up__subtitle">Masuk Untuk Mulai Berdiskusi</p>
    <form class="sign-up-form form" action="/login" method="POST">
      @csrf
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" placeholder="Enter your email" required name="email">
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" placeholder="Enter your password" required name="password">
      </label>
      <a class="link-info forget-link" href="##">Forgot your password?</a>
      <button class="form-btn primary-default-btn transparent-btn">Sign in</button>
      <span class="form-checkbox-label">Belum punya akun? <a href="{{url('/daftar')}}">Daftar disini</a> </span>
    </form>
  </article>
</main>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
</body>

</html>