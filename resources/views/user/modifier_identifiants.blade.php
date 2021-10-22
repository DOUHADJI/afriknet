

@extends('user.layout')


@section('content')

<div class="container">

    @if ($message = Session::get('error'))


    <div class="container mt-3">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
    
        <p> <span class="bi-false-circle-fill mr-1 fa-2x"></span>{{ $message }}</p>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
    </div>
    </div>    
    
    @endif

    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Modifier mes identifiants de connexion
                
                <span class="fas fa-user fa-3x ml-2 @if($user->statut_activite === 1) text-success @else text-danger @endif "> </span>
        
            </h6>


        </div>

    <form action="{{route('user.update_identifiants', $user )}}"  method="POST" >
        @csrf
        @method("PATCH")

    

        <div class="card-body">


                <div class="form-group">
                    <div class="row">

                        <div class="col">
                            <label for="new_email">Nouvel addresse mail</label>
                            <input type="text" class="form-control form-control-user @error("new_email") is-invalid @enderror "
                            id="new_email"  name="new_email" value="{{ old('new_email') }}">

                            @error("new_email")
                                <div class="invalid-feedback">{{$message}}</div>
                             @enderror
                        </div>

                    </div>
                
                </div>

                <div class="form-group">
                    <div class="row">

                        <div class="col">

                            <label for="new_password">Nouveau mot de passe</label>
                            <input type="password" class="form-control form-control-user  @error("new_password") is-invalid @enderror" 
                            id="new_password"  name="new_password" >
            
                            @error("new_password")
                            <div class="invalid-feedback">{{$message}}</div>
                         @enderror
            
                        </div>

                    </div>
                
                </div>

                <div class="form-group">
                    <div class="row">

                        <div class="col">
                            <label for="new_password_confirmation">Confirmer nouveau mot de passe </label>
                            <input type="password" class="form-control form-control-user  @error("new_password_confirmation") is-invalid @enderror" 
                            id="new_password_confirmation"  name="new_password_confirmation" >
            
                            @error("new_password_confirmation")
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