

 <nav class="navbar navbar-expand navbar-light bg-white topbar  static-top shadow">

       <!-- Sidebar - Brand -->
       <a class="navbar-brand d-flex align-items-center justify-content-center fw-bolder text-gray-600" href="{{route("user.index")}}">
        <div class="navbar-brand-icon rotate-n-15 ">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GLobal <sup>.net</sup></div>
    </a>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">


        <!-- Nav Item - Alerts -->

    

      
     

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="{{route("user.index")}}" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                <img class="img-profile rounded-circle"
                src="{{asset("template_resources/img/undraw_profile.svg")}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">

                <a class="dropdown-item" href="{{route("user.index")}}">
                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                    Accueil
                </a>

                <a class="dropdown-item" href="{{route('user.modifier_identifiants')}}">
                    <i class="fas fa-user-edit  fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Modifier mes identifiants</span>
                </a>

                <a class="dropdown-item" href="{{route('user.modifier_infos', auth()->user() )}}">
                    <i class="fas fa-pencil-alt  fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Mettre à jour mes informations</span>
                </a>

                {{-- <a class="dropdown-item" href="{{route('user.writte')}}">
                    <i class="fas fa-comments fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Writte  with us</span>
                </a> --}}

               {{--  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a> --}}

                <a class="dropdown-item" href="{{route('user.faq')}}">
                    <i class="fas fa-question-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                    FAQ
                </a>

                <div class="dropdown-divider"></div>

                <form action="{{ route("auth.logout") }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        Logout <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    </button>
                </form>

               
            </div>
        </li>

    </ul>

</nav>