<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{URL::asset('/template_resources/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>



    <title>Afriknet</title>

</head>

<body>

    <style>
      /*   .nav_div{
            background-image: url('template_resources/img/fibre_1.jpg');
            background-repeat: no-repeat;
            height:76vh; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        } */

    </style>

    <div>

        <div  class="nav_div">

           {{--  Navbar Debut --}}

           <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <div class="">
               
                <nav class=" text-white   ">
                        <span class="fs-3 fw-bolder fst-italic bg-secondary p-1 shadow">Afrik</span><span class="bg-primary p-1 fs-3 shadow fw-bold fst-italic">net</span>
               </nav>

            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-5">

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline  fw-bold "><span  class="bi bi-emoji-laughing "></span>  Nos offres</span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          Nos abonnements
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Nos forfaits
                        </a>
                      
                     
                    </div>

                </li>

                

            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-white-600 small"></span>
                        <img class="img-profile rounded-circle" src="{{asset("template_resources/img/undraw_profile.svg")}}">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Create an account
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

                        <a class="dropdown-item" href="{{route('welcome')}}"  class="fw-bold">
                           Logout <span class="bi bi-box-arrow-in-right "></span>
                        </a>

                        <div class="dropdown-divider"></div>


                    </div>
                </li>
            </ul>
            </nav>

               {{-- NavBar Fin --}}


        {{--     SubNav Debut --}}

            @yield('content')

        {{--     SubNav Fin --}}


        

        

        


        <div class="text-white bg-dark p-3">

            <div class="row">

                <div class="col">
                    <p class="fst-italic fw-bold  text-center">Afriknet</p>
                    
                </div>

                <div class="col">

                </div>

            </div>
            <div class="text-center">@Copyright 2021 - all rights reserved</div>
        </div>

           

         
       

    </div>
    
@include("dashboard.partials.footer")

</body>


</html>