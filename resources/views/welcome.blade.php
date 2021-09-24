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
        .nav_div{
            background-image: url('template_resources/img/fibre_1.jpg');
            background-repeat: no-repeat;
            height:76vh; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

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
                        <span class="mr-2 d-none d-lg-inline text-white fw-bold "><span  class="bi bi-emoji-laughing "></span>  Nos offres</span>
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
                        <span class="mr-2 d-none d-lg-inline text-white-600 small">Se connecter </span>
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

                        <a class="dropdown-item" href="{{route('login')}}"  class="fw-bold">
                           Login <span class="bi bi-box-arrow-in-right "></span>
                        </a>

                        <div class="dropdown-divider"></div>


                    </div>
                </li>
            </ul>
            </nav>

               {{-- NavBar Fin --}}


        {{--     SubNav Debut --}}

        <div class="container">
            <div class="row ">

        

                <div class="col-lg-6 col-md-6 p-5 mt-3  ">
                        <p class="text-white fw-bold fs-2 text-uppercase">Vivez <br> l'internet <br> autrement  !!!</p>

                        <hr class="text-white p-1">

                </div>

               

            </div>
    </div>

{{--     SubNav Fin --}}


        </div>

        <div class="container-fluid ">
            <p class="text-center text-success fs-5 fw-bold pt-5">Disposez de nos offres partout où vous êtes !</p>

            <div class="my-5">
                <div class="row text-center">

                   

                        <div class="col border border-2 border-success p-4 m-2">
                            <span class="fas fa-industry text-success fs-2"></span>
                            <p>Dans vos entreprises
                                <span class="bi bi-emoji-wink fs-5"></span>
                            </p>
                            <hr  class="bg-success">
                            <p class="fs-6 fw-light">Profitez <br> du wifi à haut débit <br> et restez connectés <br> au monde depuis votre bureau
                            </p>
                        </div>

                        <div class="col border border-2 border-success p-4 m-2">
                            <span class="fas fa-home text-success fs-2"></span>
                            <p>Depuis chez vous 
                                <span class="bi bi-emoji-smile fs-5"></span>
                            </p>
                            <hr  class="bg-primary">
                            <p class="fs-6 fw-light">Profitez <br> de nos forfaits et abonnements <br> et restez connectés <br> au monde depuis chez vous
                            </p>
                    </div>

                        <div class="col border border-2 border-success p-4 m-2">
                            <span class="fas fa-car text-success fs-2"></span>
                            <p>Même en voiture 
                                <span class="bi bi-emoji-sunglasses fs-5"></span>
                            </p>
                            <hr  class="bg-success">
                            <p class="fs-6 fw-light">Profitez <br> de nos différrents <br> forfaits et abonnements <br> et restez connectés <br> au monde depuis chez vous
                            </p>
                        </div>

                </div>
            </div>
        </div>
        
        

        <div class="d-flex  p-5">
                <div class="col m-3 pt-3  shadow pb-5 pr-5 pl-5">
                    <p class="text-secondary text-center fst-italic fw-bold   "><span class="bi bi-emoji-laughing"></span> Decouvrez nos offres d'abonnements !!!</p>

                    <div class=" row row-cols-2">

                                @foreach ($abonnements as $abonnement )
                                    <div class="col ">
                                        <div class=" p-4 border border-4 border-secondary mt-4">
                                            <div class="fst-italic fw-bold text-success">
                                                {{$abonnement->nom}}
                                            </div>

                                            <div class="fst-italic fw-bold d-flex">
                                                Volume : <span class="fw-bold">{{$abonnement->volume}} Go</span>
                                            </div>

                                            <div class="d-flex flex-row-reverse">
                                                <p class="fst-italic fst-bold text-warning">Validité : <span>{{$abonnement->validite}} jours</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                    </div>

                </div>

                <div class="col shadow m-3 pt-3 pb-5 pr-5 pl-5">
                    <p class="text-secondary text-center fst-italic fw-bold "><span class="bi bi-emoji-laughing"></span> Decouvrez nos offres de forfaits !!!</p>

                <div class="row row-cols-2 ">
                    
                    @foreach ($forfaits as $forfait )
                        <div class="col ">
                            <div class=" p-4 border border-4 border-secondary mt-4">
                                <div class="fst-italic fw-bold text-success">
                                    {{$forfait->nom}}
                                </div>

                                <div class="fst-italic fw-bold d-flex">
                                    Volume : <span class="fw-bold">{{$forfait->volume}} Go</span>
                                </div>

                                <div class="d-flex flex-row-reverse">
                                    <p class="fst-italic fst-bold text-warning">Validité : <span>{{$forfait->validite}} jours</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                </div>

        </div>


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