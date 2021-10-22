@extends('user.layout')


@section('content')

<div class="container">

    @if ($message = Session::get('error'))


    <div class="container mt-3">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
    
        <p> <span class="bi-check-circle-fill mr-1 fa-2x"></span>{{ $message }}</p>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
    </div>
    </div>    
    
    @endif

    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Mettre à jour mes informations  
                
                <span class="fas fa-user fa-3x ml-2 @if($user->statut_activite === 1) text-success @else text-danger @endif "> </span>
        
            </h6>


        </div>

    <form action="{{route('user.update', $user )}}"  method="POST" >
        @csrf
        @method("PATCH")

    

        <div class="card-body">

                <div class="form-group">
                    <div class="row">

                        <div class="col">
                            <label for="firstname">Nom</label>
                            <input type="text" class="form-control form-control-user @error("firstname") is-invalid @enderror " 
                            id="firstname"  name="firstname" value="{{$user->name}}">
                            
                            @error("firstname")
                               <div class="invalid-feedback">{{$message}}</div>
                            @enderror


                        </div>

                        
                        <div class="col">
                            <label for="prenom">Prénom(s)</label>
                            <input type="text" class="form-control form-control-user  @error("prenom") is-invalid @enderror " 
                            id="prenom"  name="prenom" value="{{$user->prenom}}">
                            @error("prenom")
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                        </div>

                        <div class="col">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control form-control-user @error("contact") is-invalid @enderror "
                             id="contact"  name="contact" value="{{$user->contact}}">

                            @error("contact")
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                        </div>


                    </div>
                
                </div>

                <div class="form-group">
                    <div class="row">

                        <div class="col">
                            <label for="pays">Pays</label>
                            <input type="text" class="form-control form-control-user @error("pays") is-invalid @enderror "
                            id="pays"  name="pays" value="{{$user->pays}}">

                            @error("pays")
                                <div class="invalid-feedback">{{$message}}</div>
                             @enderror
                        </div>

                        
                        <div class="col">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control form-control-user @error("ville") is-invalid @enderror "
                             id="ville"  name="ville" value="{{$user->ville}}">

                            @error("ville")
                            <div class="invalid-feedback">{{$message}}</div>
                         @enderror

                        </div>

                        
                        <div class="col">
                            <label for="type">Type</label>
                            <select  name="type" id="type" class="form-control form-control-user @error("type") is-invalid @enderror " >

                                <option value="0">--choix--</option>
                                <option value="Individu" @if($user->type =="Individu")
                                    selected
                                @endif>Individu</option>
                                <option value="Entreprise" @if($user->type == "Entreprise")
                                    selected
                                @endif>Entreprise</option>

                            </select>

                            @error("type")
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                        </div>
                
                        <div class="col">

                            <label for="statut">Statut</label>

                            <div class="form-check">

                                <input disabled class="form-check-input" type="radio" name="statut" id="statut1" value="1" @if($user->statut_activite===1)
                                    checked
                                @endif>
                                <label class="form-check-label" for="statut1">
                                  Active
                                </label>
                              </div>
                              <div class="form-check">
                                <input disabled class="form-check-input" type="radio" name="statut" id="statut2" value="0" @if($user->statut_activite !==1)
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

            <div class="col">
                <label for="password" class="fw-bold text-danger">Confirmer avec votre mot de passe actuel</label>
                <input type="password" class="form-control form-control-user  @error("password") is-invalid @enderror" 
                id="password"  name="password" >

                @error("password")
                <div class="invalid-feedback">{{$message}}</div>
             @enderror

            </div>
            <div class="col d-flex justify-content-lg-end mt-2">
                <button class="btn btn-success " type="submit">Modifier</button>

            </div>
        </div>

    </form>


</div>


</div>
    
@endsection