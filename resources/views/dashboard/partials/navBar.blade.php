
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            @if($inactive_users->count() !=null)

            <a href="#" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                    <i class="bi bi-person-x-fill"></i>
                </span>
                <span class="text">Activation requests</span>

                <span class="icon text-white-50">
                    {{ $inactive_users->count() }}
                </span>
            </a>

            
        @else
            
        @endif

        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->

      

     
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-clipboard-list fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" @if ($new_plaintes->count()==0)
                    hidden
                @else
                    
                @endif>{{$new_plaintes->count()}}+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    New plaints
                </h6>

                @if ($new_plaintes->count()==0)
                    <p class="text-xs dropdown-item ">No element</p>
                @else
                    
                
                @foreach ($new_plaintes as $plainte )

                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">by {{$users->where('id', $plainte->user_id)->first()->name}} </div>
                        <span class="font-weight-bold">{{$plainte->motif}}</span>
                        <div class="small text-gray-500 text-truncate">{{$plainte->message}} </div>

                    </div>
                </a>

                @endforeach

                @endif
                
              
                <a class="dropdown-item text-center small text-gray-500" href="{{route('new_plaintes')}}"> <span class="fas fa-eye ml-2"></span> Show All </a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-comments fa-fw"></i>
                <!-- Counter - Alerts -->
                
                <span class="badge badge-danger badge-counter" @if ($new_requetes->count()==0)
                    hidden
                @else
                    
                @endif>{{$new_requetes->count()}}+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    New requests
                </h6>

                @foreach ($new_requetes as $requete )

                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">by {{$users->where('id', $requete->user_id)->first()->name}} </div>
                        <span class="font-weight-bold">{{$requete->motif}}</span>
                        <div class="small text-gray-500 text-truncate">{{$requete->message}} </div>

                    </div>
                </a>

                @endforeach

                
              
                <a class="dropdown-item text-center small text-gray-500" href="{{route('new_requetes')}}"> <span class="fas fa-eye ml-2"></span> Show All </a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('admin')->user()->name }}</span>
                <img class="img-profile rounded-circle"
                src="{{asset("template_resources/img/undraw_profile.svg")}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route("admin.logout") }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
             
            </div>
        </li>

    </ul>

</nav>