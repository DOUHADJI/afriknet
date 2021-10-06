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



    <title>Global .net</title>

</head>

<body class="position-relative">

   

    <style>
        .nav_div{
            background-image: url('template_resources/img/02.jpg');
            background-repeat: no-repeat;
            height:85vh; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .subNavInFooter{
            background-image: url('template_resources/img/02.jpg');
            background-repeat: no-repeat;
            height:150px;
            width: 400px; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .roundDivinImgBb{
            
            background-repeat: no-repeat;
            height: 250px;
            width: 250px;
            border-radius: 190px;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .middlePageBrand{
            background-image: url('template_resources/img/07.jpg');
            background-repeat: no-repeat;
            height:100px;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-attachment: fixed;
            padding: 100px;
        }

    </style>

    <div>


        <div  class="nav_div position-relative ">

           {{--  Navbar Debut --}}

                <nav class="navbar navbar-expand   topbar mb-4 sticky-top shadow" style="background-color:rgba(134, 132, 132, 0.288);">

                    <!-- Sidebar Toggle (Topbar) -->
                  {{--   <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button> --}}

                    <!-- Topbar Search -->
                    <div class="">
                    
                        <nav class=" text-white   ">
                                <span class="fs-3 fw-bolder fst-italic  p-1 shadow">Global</span><span class=" p-1 fs-3 shadow fw-bold fst-italic">.net</span>
                        </nav>

                    </div>

                    <!-- Topbar Navbar -->

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white fw-bold small">Se connecter </span>
                                <img class="img-profile rounded-circle" src="{{asset("template_resources/img/undraw_profile.svg")}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('register') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Create an account
                                </a>
                                <a class="dropdown-item" href="#offresEtAbonnements">
                                    <i class="bi bi-back fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Nos offres
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

                <div class="container position-absolute  " style="bottom: 20px">

                    <div class="row  ">

            
                        <div class="col-lg-6 col-md-6 p-5 ml-5   d-flex align-items-end " style="background-color:rgba(134, 132, 132, 0.671);">

                            <div class="opacity-100">
                                <p class="text-white fw-bold fs-2 text-uppercase opacity-100" >Vivez <br> l'internet <br> autrement  !!!</p>

                                <hr class="text-white p-1 opacity-100">
                            </div>
                            

                        </div>
                    </div>

            
                           
                </div>
        

{{--     SubNav Fin --}}

</div>



        <div class="container-fluid ">
            <p class="text-center text-secondary fs-5 fw-bold pt-5">Disposez de nos offres partout où vous êtes !</p>

            <div class="my-5">
                <div class="row text-center">

                   

                        <div class="col  p-4 m-2">

                            <div class="border border-2 border-secondary p-2">

                                <p>Dans vos entreprises
                                    <span class="bi bi-emoji-wink fs-5"></span>
                                </p>

                                <span class="fas fa-industry text-secondary fs-2"></span>

                            </div>

                             <div class="d-flex justify-content-center mt-3">
                                <div class=" m-2  roundDivinImgBb" style="background-image: url('template_resources/img/03.jpg');">
                                </div>
                            </div>


                            <div class=" border border-2 border-secondary p-4 mt-3">

                                <p class="fs-6 fw-light  ">Profitez <br> du wifi à haut débit <br> et restez connectés <br> au monde depuis votre bureau
                                </p>
    
                            </div>
                          
                           
                            
                          
                        </div>

                        <div class="col  p-4 m-2">

                            <div class="border border-2 border-secondary p-2">

                                <p>Depuis chez vous 
                                    <span class="bi bi-emoji-smile fs-5"></span>
                                </p>

                                <span class="fas fa-home text-secondary fs-2"></span>


                            </div>


                            <div class="d-flex justify-content-center mt-3">
                                <div class=" m-2  roundDivinImgBb" style="background-image: url('template_resources/img/06.jpg');">
                                </div>
                            </div>

                            <div class=" border border-2 border-secondary p-4 mt-3">

                                <p class="fs-6 fw-light">Profitez <br> de nos forfaits et abonnements <br> et restez connectés <br> au monde depuis chez vous
                                </p>
    
                            </div>

                          
                            
                   
                            
                    </div>

                        <div class="col  p-4 m-2">

                          

                            <div class="border border-2 border-secondary p-2">

                                <p>Même en voiture 
                                    <span class="bi bi-emoji-sunglasses fs-5"></span>
                                </p>

                                <span class="fas fa-car text-secondary fs-2"></span>



                            </div>

                              <div class="d-flex justify-content-center mt-3">
                                <div class=" m-2  roundDivinImgBb" style="background-image: url('template_resources/img/04.jpg');">
                                </div>
                            </div>

                            <div class=" border border-2 border-secondary p-4 mt-3">

                                <p class="fs-6 fw-light">Profitez <br> de nos forfaits et abonnements <br> depuis le confort <br> de votre voiture
                                </p>
    
                            </div>

                          
                            
                        </div>

                </div>
            </div>
        </div>



        <div class="middlePageBrand position-sticky shadow" id="offresEtAbonnements">
            <div>
                <nav class=" text-white   ">
                    <span class="fs-3 fw-bolder fst-italic  p-1 shadow">Global</span><span class=" p-1 fs-3 shadow fw-bold fst-italic">.net</span>
                </nav>
            </div>
        </div>

           
        


        <div class="d-flex  p-5" >

                <div class="col m-3 pt-3  shadow pb-5 pr-5 pl-5">
                    <p class="text-secondary text-center fst-italic fw-bold   "><span class="bi bi-emoji-laughing"></span> Decouvrez nos offres d'abonnements !!!</p>

                    <div class=" row row-cols-2">

                                @foreach ($abonnements as $abonnement )
                                    <div class="col ">
                                        <div class=" p-4 border border-4 border-secondary mt-4">
                                            <div class="fst-italic fw-bold text-secondary">
                                                {{$abonnement->nom}}
                                            </div>

                                            <div class="fst-italic fw-bold d-flex">
                                                <span>Débit : <span class="fw-bold"> {{$abonnement->debit}}  Mo/s</span></span>
                                            </div>

                                            <div class="d-flex flex-row-reverse">
                                                <p class="fst-italic fst-bold text-warning">Validité : <span> {{$abonnement->validite}} jours</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                    </div>

                </div>

                <div class="col shadow m-3 pt-3 pb-5 pr-5 pl-5" >
                    <p class="text-secondary text-center fst-italic fw-bold "><span class="bi bi-emoji-laughing"></span> Decouvrez nos offres de forfaits !!!</p>

                        <div class="row row-cols-2 ">
                            
                            @foreach ($forfaits as $forfait )
                                <div class="col ">
                                    <div class=" p-4 border border-4 border-secondary mt-4">
                                        <div class="fst-italic fw-bold text-secondary">
                                            {{$forfait->nom}}
                                        </div>

                                        <div class="fst-italic fw-bold d-flex">
                                            <span>Volume : <span class="fw-bold">{{$forfait->volume}} Go</span></span>
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


       @include("user.partials.footer")

           

         
       

  

</div>
    


</body>


</html>