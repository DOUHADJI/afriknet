@extends('user.layout')


@section('content')

<div class="container">

    <div class="alert alert-light mb-5">
        <p class=" text-xs fw-bold text-center fst-italic">Modifier vos informations  ici<span></span> <span class="bi bi-emoji-smile"></span>
        </p>
    

        <p class=" text-md fw-bold text-center fst-italic"> <span></span>
        </p>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Edit my informations  
                
                <span class="fas fa-user fa-3x ml-2 {{-- @if($client->statut_activite === 1) text-success @else text-danger @endif  --}}"> </span>
        
            </h6>


        </div>

    <form action="{{route('user.update', $user )}}"  method="POST" >
        @csrf
        @method("PATCH")

    

        <div class="card-body">

                <div class="form-group">
                    <div class="row">

                        <div class="col">
                            <label for="firstname">FirstName</label>
                            <input type="text" class="form-control form-control-user @error("firstname") is-invalid @enderror " 
                            id="firstname"  name="firstname" value="{{$client->name}}">
                            
                            @error("firstname")
                               <div class="invalid-feedback">{{$message}}</div>
                            @enderror


                        </div>

                        
                        <div class="col">
                            <label for="prenom">LastName</label>
                            <input type="text" class="form-control form-control-user  @error("prenom") is-invalid @enderror " 
                            id="prenom"  name="prenom" value="{{$client->prenom}}">
                            @error("prenom")
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                        </div>

                        <div class="col">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control form-control-user @error("contact") is-invalid @enderror "
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
                            <input type="text" class="form-control form-control-user @error("pays") is-invalid @enderror "
                            id="pays"  name="pays" value="{{$client->pays}}">

                            @error("pays")
                                <div class="invalid-feedback">{{$message}}</div>
                             @enderror
                        </div>

                        
                        <div class="col">
                            <label for="ville">City</label>
                            <input type="text" class="form-control form-control-user @error("ville") is-invalid @enderror "
                             id="ville"  name="ville" value="{{$client->ville}}">

                            @error("ville")
                            <div class="invalid-feedback">{{$message}}</div>
                         @enderror

                        </div>

                        <div class="col">
                            <label for="type">Type</label>
                            <select  name="type" id="type" class="form-control form-control-user @error("type") is-invalid @enderror " >

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
                            <input type="email" class="form-control form-control-user @error("email") is-invalid @enderror " 
                            id="email"  name="email" value="{{$client->email}}">

                            @error("email")
                            <div class="invalid-feedback">{{$message}}</div>
                         @enderror


                        </div>

                        
                        <div class="col">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-user  @error("password") is-invalid @enderror" 
                            id="password"  name="password" value="{{$client->password}}">

                            @error("password")
                            <div class="invalid-feedback">{{$message}}</div>
                         @enderror

                        </div>

                        <div class="col-3">

                            <label for="statut">Statut</label>

                            <div class="form-check">

                                <input disabled class="form-check-input" type="radio" name="statut" id="statut1" value="1" @if($client->statut_activite===1)
                                    checked
                                @endif>
                                <label class="form-check-label" for="statut1">
                                  Active
                                </label>
                              </div>
                              <div class="form-check">
                                <input disabled class="form-check-input" type="radio" name="statut" id="statut2" value="0" @if($client->statut_activite !==1)
                                checked
                            @endif>
                                <label class="form-check-label" for="statut2">
                                  Inactive
                                </label>
                              </div>


                            <input type="statut" class="form-control form-control-user " 
                            id="statut"  name="statut" value="" hidden>

                            @error("statut")
                            <div class="invalid-feedback">{{$message}}</div>
                             @enderror

                        </div>

                        


                    </div>
                
                </div>

        </div>

        <div class="card-footer ">
                <button class="btn btn-success" type="submit">Modifier</button>
        </div>

    </form>


</div>


</div>
    
@endsection