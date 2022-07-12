<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('./css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('./css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('./css/custom-style.css')}}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/styles/night-owl.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js"></script>
    {{-- <script>hljs.highlightAll();</script> --}}
    @yield('linkHeader');
    <title>@yield('title')</title>
    <style>
        
    </style>
</head>
<body class="m-0 p-0">
        
   @include('Layout.navbar-top')

    <main class="row container-fluid ">
         @include('Layout.navside')   
        <div class=" col-lg-10 col-md-9 col-sm-8 min-vh-100 mt-5" id="main-body">
            @if (session('info'))
                <x-alert-info :message="session('info')" /> 
            @endif

            @if ($errors->any())
                <x-alert-danger :errors="$errors->all()" />
            @endif
            
            @yield('body')
        </div>
    </main>
    

    <script src="{{asset('./js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('./js/navside.js')}}"></script>
    @yield('script')
</body>
</html>