
@include('dashboard.partials.head')


<body class="" style="/* background-image: url('template_resources/img/09.jpg'); */ background-repaet : no-repeat; background-size:cover;vertical-align; overflow: hidden ">

    <div class="" style="background-color: #D2BBEB;">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="">

                <div class="card o-hidden border-0 shadow-lg ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <img class="col-lg-6 d-none d-lg-block img-fluid " src="{{asset("template_resources/img/09.jpg")}}">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Global .net</h1>
                                    </div>

                                    @if ($message = Session::get('error'))

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                
                                        <p class="text-center fst-bold"> {{ $message }} <span class="bi bi-emoji-frown ml-2 "></span> </p>
                                        
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                
                                    </div>    
                                
                                    @endif

                                    @if ($message = Session::get('success'))


                                        <div class="container mt-3">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        
                                            <p> <span class="bi-check-circle-fill mr-1 fa-2x"></span>{{ $message }}</p>
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        
                                        </div>
                                        </div>    
                                    
                                    @endif

                                    

                                    <form class="user" method="POST" action="{{ route('login')}}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid  @enderror"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">  
                                                @error("email")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error("password") is-invalid @enderror"
                                                id="password" placeholder="Password" name="password">
                                                @error("password")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                        </div>

                                        <div class="form-group text-center">
                                            
                                            <input  type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                                            <label class="" for="remember_me">Se rappeler de moi</label>
                                     
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                       
                                    </form>
                          
                                  
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account ? Click here. </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('/template_resources/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset("/template_resources/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::asset("/template_resources/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{URL::asset("/template_resourcesjs/sb-admin-2.min.js")}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

</body>

</html>