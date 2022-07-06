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
    @yield('linkHeader');
    <title>@yield('title')</title>
    <style>
        
    </style>
</head>
<body class="m-0 p-0">
        
    <nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Forum-Cloud</a>
            <ul class="navbar-nav me-3">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link active dropdown-toggle" role="button" data-bs-toggle="dropdown">User</a>
                    <ul class=" dropdown-menu me-4" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="#" class="dropdown-item">Profile</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a href="#" class="dropdown-item text-danger">logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <main class="row container-fluid ">
        <!-- <div class="row"> -->
            <div class="col-lg-2 col-md-3 col-sm-4 pe-0 ps-0">
                <!-- btn outside side nav -->
                <a href="#collapseSideNav" class="position-fixed top-50 btn btn-primary side-nav-btn show-side" id="side-nav-btn" role="button" data-bs-toggle="collapse" hidden><i class="bi bi-menu-button"></i></a>
                <!-- btn outside side nav -->

                <nav id="collapseSideNav" class="position-fixed nav-side bg-primary pt-5 px-3 collapse show collapse-horizontal h-100 nav-side">
                    <ul class="navbar-nav">
                        <li class="nav-item d-flex justify-content-between align-items-baseline">
                            <a href="./Dashboard.html" class="nav-link text-white pt-0 ms-3">Dashboard</a>
                            <!-- btn inside side nav -->
                            <a href="#collapseSideNav" class="btn btn-primary ms-3 my-0" id="inside-nav-btn" role="button" data-bs-toggle="collapse"> <i class="bi bi-arrow-left-circle fs-5"></i> </a>
                            <!-- btn inside side nav -->
                        </li>

                        <li class="nav-item nav-dropdown">
                            <a href="#collapsePost" role="button" class="nav-link text-white pb-0" data-bs-toggle="collapse" aria-controls="collapsePost">
                                <i class="bi bi-menu-button-wide"></i> 
                                Menu
                            </a>
                        </li>
                        <ul class="nav-item py-0 nav-drop-item collapse show" id="collapsePost">
                            <li class="sub-item">
                                <a href="./List-pertanyaan.html" class=" nav-link pt-0"> Pertanyaan</a>
                            </li>
                            <li class="sub-item">
                                <a href="./List-Pengguna.html" class=" nav-link pt-0"> List Pengguna</a>
                            </li>
                            <li class="sub-item">
                                <a href="./Category.html" class=" nav-link pt-0"> Category </a>
                            </li>
                        </ul>

                        <li class="nav-item nav-dropdown">
                            <a href="#collapseCategory" role="button" class="nav-link text-white pb-0" data-bs-toggle="collapse" aria-controls="collapseCategory">
                                <i class="bi bi-sliders"></i>
                                Setting
                            </a>
                        </li>
                        <ul class="nav-item py-0 nav-drop-item collapse" id="collapseCategory">
                            <li class="sub-item">
                                <a href="./Profil.html" class=" nav-link pt-0"> <i class="bi bi-file-person"></i> Profile</a>
                            </li>
                        </ul>
                        
                    </ul>
                </nav>
            </div>
            <div class=" col-lg-10 col-md-9 col-sm-8 min-vh-100 mt-5" id="main-body">
                @yield('body')
            </div>
        <!-- </div> -->
    </main>
    

    <script src="{{asset('./js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('./js/navside.js')}}"></script>
    @yield('script')
</body>
</html>