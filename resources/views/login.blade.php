
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
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <a href="{{route('user.index')}}" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                        <hr>
                                       
                                    </form>
                          
                                  
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
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

</body>

</html>