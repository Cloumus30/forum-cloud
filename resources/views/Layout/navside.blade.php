<div class="col-lg-2 col-md-3 col-sm-4 pe-0 ps-0">
    <!-- btn outside side nav -->
    <a href="#collapseSideNav" class="position-fixed top-50 btn btn-primary side-nav-btn show-side" id="side-nav-btn" role="button" data-bs-toggle="collapse" hidden><i class="bi bi-menu-button"></i></a>
    <!-- btn outside side nav -->

    <nav id="collapseSideNav" class="position-fixed nav-side bg-primary pt-5 px-3 collapse show collapse-horizontal h-100 nav-side">
        <ul class="navbar-nav">
            <li class="nav-item d-flex justify-content-between align-items-baseline">
                <a href="{{url('/dashboard')}}" class="nav-link text-white pt-0 ms-3">Dashboard</a>
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
                    <a href="{{url('/list-pertanyaan')}}" class=" nav-link pt-0"> Pertanyaan</a>
                </li>
                <li class="sub-item">
                    <a href="{{url('/list-pengguna')}}" class=" nav-link pt-0"> List Pengguna</a>
                </li>
                <li class="sub-item">
                    <a href="{{url('/list-kategori')}}" class=" nav-link pt-0"> Category </a>
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
                    <a href="{{url('/profil')}}" class=" nav-link pt-0"> <i class="bi bi-file-person"></i> Profile</a>
                </li>
            </ul>
            
        </ul>
    </nav>
</div>