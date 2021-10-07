
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

                                     <form  action="{{ route('register') }}" class="user" method="POST" >
                                        @csrf

                                        <div class="form-group d-flex">
                                           
                                            <input type="text" class="form-control form-control-user mr-2 @error("name") is-invalid @enderror"
                                                id="name" placeholder="Name" name="name" value="{{old("name")}}">

                                                @error("name")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                                <input type="text" class="form-control form-control-user ml-2 @error("prenoms") is-invalid @enderror"
                                                id="prenoms" placeholder="Prénom(s)" name="prenoms" value="{{old("prenoms")}}">

                                                @error("prenoms")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                        </div>




                                        <div class="form-group d-flex">

                                            <input type="text" class="form-control form-control-user mr-2 @error("pays") is-invalid @enderror "
                                                id="pays" placeholder="Pays" name="pays" value="{{old('pays')}}">

                                                @error("pays")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                                <input type="text" class="form-control form-control-user ml-2 mr-2 @error("ville") is-invalid @enderror "
                                                id="ville" placeholder="Ville" name="ville" value="{{old('ville')}}">

                                                @error("ville")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                                <input type="text" class="form-control form-control-user ml-2 @error("contact") is-invalid @enderror"
                                                id="contact" placeholder="Contact" name="contact" value="{{old('contact')}}">

                                                @error("contact")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                        </div>

                                

                                        <div class="col" hidden>
                                            <label for="statut">Statut</label>
                                            <input  class="form-control form-control-user  @error("statut") is-invalid @enderror" 
                                            id="statut"  name="statut" value="{{1}}">
        
                                            @error("statut")
                                            <div class="invalid-feedback">{{$message}}</div>
                                         @enderror
        
                                        </div>


                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error("email") is-invalid @enderror"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" value="{{old('email')}}">

                                                @error("email")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                             


                                        </div>

                                        <div class="form-group">
                                           
                                        </div>


                                        <div class="form-group d-flex">

                                            <input type="password" class="form-control form-control-user mr-2 @error("password") is-invalid @enderror"
                                            id="password" placeholder="Password" name="password">

                                            @error("password")
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror


                                            <input type="password" class="form-control form-control-user ml-2 @error("password_confirmation") is-invalid @enderror "
                                                id="password_confirmation" placeholder="Password confirmation" name="password_confirmation">

                                                @error("password_confirmation")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror

                                        </div>

                                                
                                        <div class="form-group">
                                          
                                            <div class="form-check">
                                                <input class="form-check-input @error("type") is-invalid @enderror" type="radio" name="type" id="type1" name="type" value="Individu"  @if(old('type')) checked @endif>
                                                <label class="form-check-label" for="type1" >
                                                  Individu
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input @error("type") is-invalid @enderror" type="radio" name="type" id="type2" name="type" value="Entreprise" @if(old('type')) checked @endif>
                                                <label class="form-check-label" for="type2">
                                                  Entreprise
                                                </label>

                                                @error("type")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror


                                              </div>

                                        </div>


                                      
                                        
                                      

                                      

                                        <button  class="btn btn-primary btn-user btn-block mt-2" type="submit">
                                            Create my account
                                        </button>
                                        <hr>
                                       
                                    </form>
                          
                                  
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Login ? Click here </a>
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


   