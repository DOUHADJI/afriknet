@extends("plaintes.layout")

@section("content")
    
        <div class="d-flex align-items-start">

            <div class="nav flex-row nav-pills  col-4" id="v-pills-tab" role="tablist" aria-orientation="horizontal"
             style="height: 35rem; overflow-y: scroll; /* width:350px !important */">

                <div class="container">

                    <form action="{{ route ('plaintes.filter_statut')}}"  method="GET">

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
               <p class="fw-bold text-primary text-md border border-primary p-3 mt-3">Nombre de plaintes : {{$plaintes->count()}}</p>


                </div>

                @foreach ($plaintes as $plainte )

                    <button class="btn m-2 w-100 " id="v-pills-{{$plainte->id}}-tab" data-bs-toggle="pill" 
                        data-bs-target="#v-pills-{{$plainte->id}}" type="button" role="tab" 
                        aria-controls="v-pills-{{$plainte->id}}" aria-selected="true">


                            <div class="card" >
                                <div class="card-header">
                                    <p class="fw-bold">Plainte : PLT_{{$plainte->id}}</p>
                                </div>
                                <div class="card-body">

                                    <span class="d-flex align-items-start">
                                        <p>
                                            Statut : <span class="badge p-2 text-wrap" style="background-color: @switch( $plainte->statut )
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
                                            @endswitch">{{$plainte->statut}}</span>
                                        </p>
                                    </span>

                                    <span class="d-flex align-items-start">
                                        <p>
                                            Motif : <span class="badge  p-2 text-wrap" style="background-color: #c981ae">{{$plainte->motif}}</span>
                                        </p>
                                    </span>

                                    


                                    <div class="card-footer">
                                        <span class="d-flex align-items-end ">
                                            <p>
                                                  Date : <span class="badge badge-danger p-2 text-wrap"> {{$plainte->updated_at}}</span>
                                            </p>
                                        </span>
                                    </div>

                                </div>
                            </div>
                    
                    </button>
                    
                @endforeach

            </div>

            <div class="tab-content " id="v-pills-tabContent">

                @foreach ($plaintes as $plainte )

                <div class="tab-pane fade show " id="v-pills-{{$plainte->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">

                    <p class="fw-bold ml-3 text-xs">Plainte : PLT_{{$plainte->id}}</p>

                    <div class="card ml-3 mr-3 mt-3">

                        <div class="card-header">
                            <p class="fw-bold ml-3 text-lg">Plainte : PLT_{{$plainte->id}}</p>
                        </div>

                        <div class="card-body">

                                <div class="d-flex ">
                                            
                                    <div class="col">
                                        <p>Statut : <span class="badge p-2" style="background-color: @switch( $plainte->statut )
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
                                        @endswitch">{{$plainte->statut}}</span></p>
                                    </div>

                                    <div class="col-6">

                                       <form action="{{route('plaintes.update', $plainte->id)}}" method="POST" id="{{$plainte->id}}">
                                                @csrf
                                                @method("PATCH")

                                                <div class="form-floating" >

                                                    <select class="form-select"  name="statut">
                                                        
                                                    <option value="reçu" @if($plainte->statut=="reçu")
                                                        selected
                                                    @endif>Reçu</option>

                                                    <option value="ordonné" @if($plainte->statut=="ordonné")
                                                        selected
                                                    @endif>Ordonné</option>

                                                    <option value="en cours de traitement"@if($plainte->statut=="en cours de traitement")
                                                        selected
                                                    @endif>En cours de traitement</option>

                                                    <option value="traité" @if($plainte->statut=="traité")
                                                        selected
                                                    @endif>Traité</option>

                                                    <option value="archivé" @if($plainte->statut=="archivé")
                                                        selected
                                                    @endif>Archivé</option>

                                                    </select>

                                                    <label for="floatingSelect">Edit statut</label>
                                                </div>

                                       </form>

                                    </div>

                                    <div class="col">
                                        <p>Updated at  : <span class="badge badge-danger p-2">{{$plainte->updated_at}}</span></p>
                                    </div>

                                </div>

                                <hr>

                                <div class="d-flex  justify-content-around">
                                    <div class="">
                                        <p>Email : <span class="badge badge-light p-2">
                                            {{App\Models\User::where(['id'=> $plainte->user_id]) ->first()->email}}</span></p>
                                    </div>

                                    <div class="">
                                        <p>statut : <span class="badge 
                                            
                                            @if( App\Models\User::where(['id'=> $plainte->user_id]) ->first()->statut_activite == 1)
                                                badge-success
                                                @else
                                                badge-danger
                                            @endif
                                            p-2"> 
                                            
                                            @if( App\Models\User::where(['id'=> $plainte->user_id]) ->first()->statut_activite == 1)
                                            Active
                                            @else
                                            Inactive
                                        @endif
                                           </span></p>
                                    </div>

                                    <div class="">
                                        <p>Contact : <span class="badge badge-light  p-2">
                                            {{App\Models\User::where(['id'=> $plainte->user_id]) ->first()->contact}}</span></p>
                                    </div>

                                </div>

                                <hr>

                                <div>
                                    <p>Message : </p>

                                    <p> {{$plainte->message}}</p>


                                    <div class="d-flex flex-row-reverse">
                                        <p class=" mr-4 mt-5"">by : {{App\Models\User::where(['id'=> $plainte->user_id]) ->first()->name}}</p>
                                    </div>
                                   
                                </div>

                        </div>

                    </div>

                    <div class="d-flex  flex-row-reverse">       
                        <button class="btn btn-warning mr-4 mt-2 pr-4 pl-4 mb-2" type="submit" form="{{$plainte->id}}">Update</button>                       
                    </div>
                
                </div>

                    
                @endforeach
          
            </div>
        </div>

@endsection




