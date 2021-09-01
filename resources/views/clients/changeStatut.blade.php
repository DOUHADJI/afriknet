@extends('clients.layout')


@section('content')
    

    <!-- Create a new client -->

     <!-- Basic Card Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Edit client  
                
                <span class="fas fa-user fa-3x ml-2 @if($client->statut_activite === 1) text-success @else text-danger @endif "> </span>
        
        </h6>


        </div>

            
       
            <form action="{{route('clients.changeStatut', $client )}}"  method="POST">
                @csrf
                @method("PATCH")

                <div class="card-body">

                        <div class="form-group">
                            <div class="row">

                                <div class="col">
                                    <label for="firstname">FirstName</label>
                                    <input disabled type="text" class="form-control form-control-user @error("firstname") is-invalid @enderror " 
                                    id="firstname"  name="firstname" value="{{$client->name}}">
                                    
                                    @error("firstname")
                                       <div class="invalid-feedback">{{$message}}</div>
                                    @enderror


                                </div>

                                
                                <div class="col">
                                    <label for="prenom">LastName</label>
                                    <input disabled type="text" class="form-control form-control-user  @error("prenom") is-invalid @enderror " 
                                    id="prenom"  name="prenom" value="{{$client->prenom}}">
                                    @error("prenom")
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>

                                <div class="col">
                                    <label for="contact">Contact</label>
                                    <input disabled type="text" class="form-control form-control-user @error("contact") is-invalid @enderror "
                                     id="contact"  name="contact" value="{{$client->contact}}">

                                    @error("contact")
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>


                            </div>
                        
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col">
                                    <label for="pays">Country</label>
                                    <input disabled type="text" class="form-control form-control-user @error("pays") is-invalid @enderror "
                                    id="pays"  name="pays" value="{{$client->pays}}">

                                    @error("pays")
                                        <div class="invalid-feedback">{{$message}}</div>
                                     @enderror
                                </div>

                                
                                <div class="col">
                                    <label for="ville">City</label>
                                    <input disabled type="text" class="form-control form-control-user @error("ville") is-invalid @enderror "
                                     id="ville"  name="ville" value="{{$client->ville}}">

                                    @error("ville")
                                    <div class="invalid-feedback">{{$message}}</div>
                                 @enderror

                                </div>

                                <div class="col">
                                    <label for="type">Type</label>
                                    <select disabled name="type" id="type" class="form-control form-control-user @error("type") is-invalid @enderror " >

                                        <option value="0">--choix--</option>
                                        <option value="Individu" @if($client->type =="Individu")
                                            selected
                                        @endif>Individu</option>
                                        <option value="Entreprise" @if($client->type == "Entreprise")
                                            selected
                                        @endif>Entreprise</option>

                                    </select>

                                    @error("type")
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>

                        


                            </div>
                        
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col">
                                    <label for="email">Email</label>
                                    <input disabled type="email" class="form-control form-control-user @error("email") is-invalid @enderror " 
                                    id="email"  name="email" value="{{$client->email}}">

                                    @error("email")
                                    <div class="invalid-feedback">{{$message}}</div>
                                 @enderror


                                </div>

                                
                                <div class="col">
                                    <label for="password">Password</label>
                                    <input disabled type="password" class="form-control form-control-user  @error("password") is-invalid @enderror" 
                                    id="password"  name="password" value="{{$client->password}}">

                                    @error("password")
                                    <div class="invalid-feedback">{{$message}}</div>
                                 @enderror

                                </div>

                                <div class="col-3">

                                    <label for="statut">Change statut to : </label>

                                    <div class="form-check">

                                        <input  class="form-check-input" type="radio" name="statut" id="statut1" value="1" @if($client->statut_activite===1)
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="statut1">
                                          Active
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input  class="form-check-input" type="radio" name="statut" id="statut2" value="0" @if($client->statut_activite !==1)
                                        checked
                                    @endif>
                                        <label class="form-check-label" for="statut2">
                                          Inactive
                                        </label>
                                      </div>



                                    @error("statut")
                                    <div class="invalid-feedback">{{$message}}</div>
                                     @enderror

                                </div>

                                


                            </div>
                        
                        </div>

                </div>

                <div class="card-footer  ">
                    <div class="container">
                        <div class="row justify-content-end">

                            <div class="col">
                            </div>

                            <div class="col">
                                
                            </div>
                        
                      
                        </div>

                        <div class="d-flex flex-row-reverse bd-highlight">

                            <div class="p-2 bd-highlight">
                             
                                    <button type="submit" class="btn btn-success px-5" >Save changes</button>
                               
                            </div>


                            <div class="p-2 bd-highlight">

                                <a class="btn btn-dark" href="{{ route("clients.statuts") }}">Annuler</a>
                                
                            </div>

                            
                            
                          </div>

                    </div>
                       

                </div>

            </form>

    </div>

</div>
    


@endsection