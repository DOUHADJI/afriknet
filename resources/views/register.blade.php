
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


                                    <form class="user" action="{{route('')}}">
                                        
                                        <div class="form-group d-flex">

                                            <input type="text" class="form-control form-control-user mr-2"
                                                id="exampleInputPassword" placeholder="Name" name="name">

                                                <input type="text" class="form-control form-control-user ml-2"
                                                id="exampleInputPassword" placeholder="Prénom(s)" name="prenoms">

                                        </div>


                                        <div class="form-group d-flex">

                                            <input type="text" class="form-control form-control-user mr-2"
                                                id="exampleInputPassword" placeholder="Pays" name="pays">

                                                <input type="text" class="form-control form-control-user ml-2 mr-2"
                                                id="exampleInputPassword" placeholder="Ville" name="ville">

                                                <input type="text" class="form-control form-control-user ml-2"
                                                id="exampleInputPassword" placeholder="Contact" name="contact">

                                        </div>


                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>


                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password confirmation" name="password_confirmation">
                                        </div>


                                        <div class="form-group">
                                          
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1" name="type">
                                                <label class="form-check-label" for="flexRadioDefault1" >
                                                  Individu
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault2" name="type">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                  Entreprise
                                                </label>
                                              </div>

                                        </div>
                                        
                                      

                                      

                                        <button  class="btn btn-primary btn-user btn-block mt-2" type="submit">
                                            Create my account
                                        </button>
                                        <hr>
                                       
                                    </form>
                          
                                  
                                    <div class="text-center">
                                        <a class="small" href="{{route('login')}}">Create an Account!</a>
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