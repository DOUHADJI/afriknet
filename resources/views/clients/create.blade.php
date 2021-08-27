@extends('clients.layout')


@section('content')
    

    <!-- Create a new client -->

     <!-- Basic Card Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add new client</h6>
        </div>

            
       
            <form action="{{route('clients.store')}}" method="POST">
                @csrf
                <div class="card-body">

                        <div class="form-group">
                            <div class="row">

                                <div class="col">
                                    <label for="firstname">FirstName</label>
                                    <input type="text" class="form-control form-control-user @error("firstname") is-invalid @enderror " 
                                    id="firstname"  name="firstname" value="{{old("firstname")}}">
                                    
                                    @error("firstname")
                                       <div class="invalid-feedback">{{$message}}</div>
                                    @enderror


                                </div>

                                
                                <div class="col">
                                    <label for="prenom">LastName</label>
                                    <input type="text" class="form-control form-control-user  @error("prenom") is-invalid @enderror " 
                                    id="prenom"  name="prenom" value="{{old("prenom")}}">
                                    @error("prenom")
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>

                                <div class="col">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control form-control-user @error("contact") is-invalid @enderror "
                                     id="prenom"  name="contact" value="{{old("contact")}}">

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
                                    id="pays"  name="pays" value="{{old("pays")}}">

                                    @error("pays")
                                        <div class="invalid-feedback">{{$message}}</div>
                                     @enderror
                                </div>

                                
                                <div class="col">
                                    <label for="ville">City</label>
                                    <input type="text" class="form-control form-control-user @error("ville") is-invalid @enderror "
                                     id="ville"  name="ville" value="{{old("ville")}}">

                                    @error("ville")
                                    <div class="invalid-feedback">{{$message}}</div>
                                 @enderror

                                </div>

                                <div class="col">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control form-control-user @error("type") is-invalid @enderror " >

                                        <option value="0">--choix--</option>
                                        <option value="Individu">Individu</option>
                                        <option value="Entreprise">Entreprise</option>

                                    </select>

                                    @error("type")
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>

                                <div class="col" hidden>
                                    <label for="statut">Statut</label>
                                    <input type="checkbox" class="form-control form-control-user  @error("statut") is-invalid @enderror" 
                                    id="statut"  name="statut" value="{{1}}">

                                    @error("statut")
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
                                    id="email"  name="email" value="{{old("email")}}">

                                    @error("email")
                                    <div class="invalid-feedback">{{$message}}</div>
                                 @enderror


                                </div>

                                
                                <div class="col">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-user  @error("password") is-invalid @enderror" 
                                    id="password"  name="password">

                                    @error("password")
                                    <div class="invalid-feedback">{{$message}}</div>
                                 @enderror

                                </div>

                                


                            </div>
                        
                        </div>

                </div>

                <div class="card-footer ">
                        <button class="btn btn-success" type="submit">Creer</button>
                </div>

            </form>

    </div>

</div>
    


@endsection