<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum Cloud | Daftar</title>
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
    <a href="/" class="sign-up__title text-decoration-none navbar-brand fs-1 ">Forum-Cloud</a>
    <p class="sign-up__subtitle">Silahkan Daftar, Malu Bertanya Sesat Di Jalan :)</p>
    <form class="sign-up-form form was-validated " action="/daftar" method="POST">
      @csrf
      <label class="form-label-wrapper">
        <p class="form-label">Name</p>
        <input class="form-input" type="text" placeholder="Masukkan Nama" required name="nama" id="nama">
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" placeholder="Masukkan Email" required name="email" id="email">
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" placeholder="Masukkan Password" required name="password" id="password">
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password Confirmation</p>
        <input class="form-input" type="password" placeholder="Konfirmasi password" required name="password_confirm" id="password_confirm">
        <div id="confirm_password_validation" class="text-danger" hidden>
          Konfrimasi password Harus Sama
        </div>
      </label>
      <!-- <label class="form-checkbox-wrapper">
        <input class="form-checkbox" type="checkbox" required>
        <span class="form-checkbox-label">Remember me next time</span>
      </label> -->
      <button type="submit" id="submitBtn" class="form-btn primary-default-btn transparent-btn">Sign in</button>
      <span class="form-checkbox-label">Sudah punya akun? <a href="{{url('/login')}}">Login disini</a> </span>
    </form>
  </article>
</main>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
<script>
  // Confirm Password
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('password_confirm');
  const confirmPassValidation = document.getElementById('confirm_password_validation');
  const submitBtn = document.getElementById('submitBtn');

  confirmPassword.addEventListener('keyup',passwordConfirm);
  password.addEventListener('keyup',passwordConfirm);

  function passwordConfirm(){
    if(password.value !== confirmPassword.value){
      confirmPassValidation.hidden = false;
      submitBtn.disabled = true;
      submitBtn.classList.add("disabled")
    }else{
    confirmPassValidation.setAttribute('hidden','true');
    submitBtn.disabled = false;
    submitBtn.classList.remove("disabled")
    }
  }
</script>
</body>

</html>