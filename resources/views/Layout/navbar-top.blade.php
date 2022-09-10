@php
$user = auth()->user()    
@endphp
<nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
    <div class="container-fluid">
        <a href="{{url('/')}}" class="navbar-brand">Forum-Cloud</a>
        <ul class="navbar-nav me-3">
            <li class="nav-item">
                @if ($user->gambarUser)
                    <img src="{{$user->gambarUser->url}}" class="rounded-circle" width="35px" height="35px" alt="">       
                @else
                    <img src="{{asset('/image/default_profile.png')}}" class="rounded-circle" width="35px" height="35px" alt="">       
                @endif
                
            </li>
            <li class="nav-item dropdown">
               
                <a href="#" class="nav-link active dropdown-toggle" role="button" data-bs-toggle="dropdown">{{$user->nama}}</a>
            
                <ul class=" dropdown-menu me-4" aria-labelledby="navbarDropdown">
                    <li>
                        <a href="{{url('/profil')}}" class="dropdown-item">Profile</a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a href="{{url('/logout')}}" class="dropdown-item text-danger">logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>