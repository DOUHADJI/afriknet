<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{URL::asset('/template_resources/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>

<body>
    <style>

        .main-div{
            background-image: url({{ asset ('template_resources/img/11.jpg') }});
            background-repeat: no-repeat;
            background-position : center center;
            
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .sub_main_div{
            background-color: rgba(0, 0, 0, 0.438)
        }

    </style>

    <div class="main-div">
        <div class="sub_main_div h-100 d-flex justify-content-center py-5 ">
                <div class="p-5 border my-5 w-50 text-white " style="background-color: rgba(0, 0, 0, 0.527)">
                        <p class="text-white fs-3 fw-light">Global .net</p>
                        <hr class="bg-light">
                        <p class="text-center fs-3 text-white fw-light ">Confirmation par email</p>
                        <hr class="bg-light">

                        <p class="fw-lighter mt-3 " ><span class="fs-5">Salut {{ $user->name }}</span> . <br> Bienvenue chez Global .net.</p>
                        <p class=" fw-lighter" >Il vous reste une dernière étape pour pouvoir profiter pleinement de nos services</p>
                        <p class=" mt-2 fw-lighter ">Un mail de confirmation vous a été envoyé. Veuillez confirmer votre addresse mail pour valider votre compte </p>

                        {{-- <a href="#" class="btn btn-light btn-icon-split ">
                            <span class="icon text-gray-600">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="text">Renvoyer un mail de confirmation</span>
                        </a> --}}

                        
                </div>
        </div>
    </div>

 
    
</body>

</html>