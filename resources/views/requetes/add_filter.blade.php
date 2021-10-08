@extends("requetes.layout")

@section("content")
    
        <div class="d-flex align-items-start">

            <div class="nav flex-row nav-pills  col-4" id="v-pills-tab" role="tablist" aria-orientation="horizontal"
             style="height: 35rem; overflow-y: scroll; /* width:350px !important */">

                <div class="container">

                    <form action="{{ route ('requetes.filter_statut')}}"  method="GET">

                        <div class="form-floating" >

                            <select  class="form-select" id="floatingSelect" aria-label="Floating label select example" name="statut" id="statut" onchange="this.form.submit()">
                                
                            <option value="0" class="text-danger">-- Select a statut --</option>
                            <option value="reçu">Reçu</option>
                            <option value="ordonné">Ordonné</option>
                            <option value="en cours de traitement">En cours de traitement</option>
                            <option value="traité">Traité</option>
                            <option  value="archivé" >Archivé</option>
                          


                            </select>

                            <label for="floatingSelect" class="text-md fw-bold text-primary">Filter statut</label>
                        </div>

               </form>

               <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                Filtered by : <br>
                <strong>{{$statut_requete}}</strong>                 

                <a href="{{route('requetes.index')}}">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </a>
              </div>

              <p class="fw-bold text-primary text-md border border-primary p-3 mt-3">Nombre de requetes : {{$requetes->count()}}</p>

                </div>

                @foreach ($requetes as $requete )

                    <button class="btn m-2 w-100 " id="v-pills-{{$requete->id}}-tab" data-bs-toggle="pill" 
                        data-bs-target="#v-pills-{{$requete->id}}" type="button" role="tab" 
                        aria-controls="v-pills-{{$requete->id}}" aria-selected="true">


                            <div class="card" >
                                <div class="card-header">
                                    <p class="fw-bold">Requête : RQT_{{$requete->id}}</p>
                                </div>
                                <div class="card-body">

                                    <span class="d-flex align-items-start">
                                        <p>
                                            Statut : <span class="badge p-2 text-wrap" style="background-color: @switch( $requete->statut )
                                                @case("reçu")
                                                #7a796d
                                                    @break

                                                    @case("ordonné")
                                                    #ffad61
                                                    @break

                                                    @case("en cours de traitement")
                                                #4b7ead
                                                    @break

                                                    @case("traité")
                                                    #a3f291
                                                    @break
                                            
                                                @default
                                                #518f4d
                                            @endswitch">{{$requete->statut}}</span>
                                        </p>
                                    </span>

                                    <span class="d-flex align-items-start">
                                        <p>
                                            Motif : <span class="badge  p-2 text-wrap" style="background-color: #c981ae">{{$requete->motif}}</span>
                                        </p>
                                    </span>

                                    


                                    <div class="card-footer">
                                        <span class="d-flex align-items-end ">
                                            <p>
                                                  Date : <span class="badge badge-danger p-2 text-wrap"> {{$requete->updated_at}}</span>
                                            </p>
                                        </span>
                                    </div>

                                </div>
                            </div>
                    
                    </button>
                    
                @endforeach

            </div>

            <div class="tab-content " id="v-pills-tabContent">

                @foreach ($requetes as $requete )

                <div class="tab-pane fade show " id="v-pills-{{$requete->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">

                    <p class="fw-bold ml-3 text-xs">Requête : RQT_{{$requete->id}}</p>

                    <div class="card ml-3 mr-3 mt-3">

                        <div class="card-header">
                            <p class="fw-bold ml-3 text-lg">Requête : RQT_{{$requete->id}}</p>
                        </div>

                        <div class="card-body">

                                <div class="d-flex ">
                                            
                                    <div class="col">
                                        <p>Statut : <span class="badge p-2" style="background-color: @switch( $requete->statut )
                                            @case("reçu")
                                            #7a796d
                                                @break

                                                @case("ordonné")
                                                #ffad61
                                                @break

                                                @case("en cours de traitement")
                                            #4b7ead
                                                @break

                                                @case("traité")
                                                #a3f291
                                                @break
                                        
                                            @default
                                            #518f4d
                                        @endswitch">{{$requete->statut}}</span></p>
                                    </div>

                                    <div class="col-6">

                                       <form action="{{route('requetes.update', $requete->id)}}" method="POST" id="{{$requete->id}}">
                                                @csrf
                                                @method("PATCH")

                                                <div class="form-floating" >

                                                    <select class="form-select"  name="statut">
                                                        
                                                    <option value="reçu" @if($requete->statut=="reçu")
                                                        selected
                                                    @endif>Reçu</option>

                                                    <option value="ordonné" @if($requete->statut=="ordonné")
                                                        selected
                                                    @endif>Ordonné</option>

                                                    <option value="en cours de traitement"@if($requete->statut=="en cours de traitement")
                                                        selected
                                                    @endif>En cours de traitement</option>

                                                    <option value="traité" @if($requete->statut=="traité")
                                                        selected
                                                    @endif>Traité</option>

                                                    <option value="archivé" @if($requete->statut=="archivé")
                                                        selected
                                                    @endif>Archivé</option>

                                                    </select>

                                                    <label for="floatingSelect">Edit statut</label>
                                                </div>

                                       </form>

                                    </div>

                                    <div class="col">
                                        <p>Updated at  : <span class="badge badge-danger p-2">{{$requete->updated_at}}</span></p>
                                    </div>

                                </div>

                                <hr>

                                <div class="d-flex  justify-content-around">
                                    <div class="">
                                        <p>Email : <span class="badge badge-light p-2">
                                            {{App\Models\clients::where(['id'=> $requete->client_id]) ->first()->email}}</span></p>
                                    </div>

                                    <div class="">
                                        <p>statut : <span class="badge 
                                            
                                            @if( App\Models\clients::where(['id'=> $requete->client_id]) ->first()->statut_activite == 1)
                                                badge-success
                                                @else
                                                badge-danger
                                            @endif
                                            p-2"> 
                                            
                                            @if( App\Models\clients::where(['id'=> $requete->client_id]) ->first()->statut_activite == 1)
                                            Active
                                            @else
                                            Inactive
                                        @endif
                                           </span></p>
                                    </div>

                                    <div class="">
                                        <p>Contact : <span class="badge badge-light  p-2">
                                            {{App\Models\clients::where(['id'=> $requete->client_id]) ->first()->contact}}</span></p>
                                    </div>

                                </div>

                                <hr>

                                <div>
                                    <p>Message : </p>

                                    <p> {{$requete->message}}</p>


                                    <div class="d-flex flex-row-reverse">
                                        <p class=" mr-4 mt-5"">by : {{App\Models\clients::where(['id'=> $requete->client_id]) ->first()->name}}</p>
                                    </div>
                                   
                                </div>

                        </div>

                    </div>

                    <div class="d-flex  flex-row-reverse">       
                        <button class="btn btn-warning mr-4 mt-2 pr-4 pl-4 mb-2" type="submit" form="{{$requete->id}}">Update</button>                       
                    </div>
                
                </div>

                    
                @endforeach
          
            </div>
        </div>

@endsection




