@extends("plaintes.layout")

@section("content")
    
        <div class="d-flex align-items-start">

            <div class="nav flex-row nav-pills  col-4" id="v-pills-tab" role="tablist" aria-orientation="horizontal"
             style="height: 35rem; overflow-y: scroll; /* width:350px !important */">

                <div class="container">
                         <p class="fw-bold text-primary text-md border border-primary p-3">Nombre de plaintes : {{$archives->count()}}</p>
                </div>

                @foreach ($archives as $archive )

                    <button class="btn m-2 w-100 " id="v-pills-{{$archive->id}}-tab" data-bs-toggle="pill" 
                        data-bs-target="#v-pills-{{$archive->id}}" type="button" role="tab" 
                        aria-controls="v-pills-{{$archive->id}}" aria-selected="true">


                            <div class="card" >
                                <div class="card-header">
                                    <p class="fw-bold">Plainte : PLT_{{$archive->id}}</p>
                                </div>
                                <div class="card-body">

                                    <span class="d-flex align-items-start">
                                        <p>
                                            Statut : <span class="badge badge-success p-2 text-wrap">{{$archive->statut}}</span>
                                        </p>
                                    </span>

                                    <span class="d-flex align-items-start">
                                        <p>
                                            Motif : <span class="badge badge-info p-2 text-wrap">{{$archive->motif}}</span>
                                        </p>
                                    </span>

                                    


                                    <div class="card-footer">
                                        <span class="d-flex align-items-end ">
                                            <p>
                                                  Date : <span class="badge badge-danger p-2 text-wrap"> {{$archive->updated_at}}</span>
                                            </p>
                                        </span>
                                    </div>

                                </div>
                            </div>
                    
                    </button>
                    
                @endforeach

            </div>

            <div class="tab-content " id="v-pills-tabContent">

                @foreach ($archives as $archive )

                <div class="tab-pane fade show " id="v-pills-{{$archive->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">

                    <p class="fw-bold ml-3 text-xs">Plainte : PLT_{{$archive->id}}</p>

                    <div class="card ml-3 mr-3 mt-3">

                        <div class="card-header">
                            <p class="fw-bold ml-3 text-lg">Plainte : PLT_{{$archive->id}}</p>
                        </div>

                        <div class="card-body">

                                <div class="d-flex ">
                                            
                                    <div class="col">
                                        <p>Statut : <span class="badge badge-success p-2">{{$archive->statut}}</span></p>
                                    </div>

                                    <div class="col-6">

                                       <form action="">

                                                <div class="form-floating" id="statut_form">
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        
                                                    <option value="reçu">Reçu</option>
                                                    <option value="ordonné">Ordonné</option>
                                                    <option value="en cours de traitement">En cours de traitement</option>
                                                    <option value="traité">Traité</option>
                                                    <option value="archivé" selected>Archivé</option>

                                                    </select>

                                                    <label for="floatingSelect">Edit statut</label>
                                                </div>

                                       </form>
                                    </div>

                                    <div class="col">
                                        <p>Updated at  : <span class="badge badge-danger p-2">{{$archive->updated_at}}</span></p>
                                    </div>

                                </div>

                                <hr>

                                <div class="d-flex  justify-content-around">
                                    <div class="">
                                        <p>Email : <span class="badge badge-light p-2">
                                            {{App\Models\clients::where(['id'=> $archive->client_id]) ->first()->email}}</span></p>
                                    </div>

                                    <div class="">
                                        <p>statut : <span class="badge 
                                            
                                            @if( App\Models\clients::where(['id'=> $archive->client_id]) ->first()->statut_activite == 1)
                                                badge-success
                                                @else
                                                badge-danger
                                            @endif
                                            p-2"> 
                                            
                                            @if( App\Models\clients::where(['id'=> $archive->client_id]) ->first()->statut_activite == 1)
                                            Active
                                            @else
                                            Inactive
                                        @endif
                                           </span></p>
                                    </div>

                                    <div class="">
                                        <p>Contact : <span class="badge badge-light  p-2">
                                            {{App\Models\clients::where(['id'=> $archive->client_id]) ->first()->contact}}</span></p>
                                    </div>

                                </div>

                                <hr>

                                <div>
                                    <p>Message : </p>

                                    <p> {{$archive->message}}</p>


                                    <div class="d-flex flex-row-reverse">
                                        <p class=" mr-4 mt-5"">by : {{App\Models\clients::where(['id'=> $archive->client_id]) ->first()->name}}</p>
                                    </div>
                                   
                                </div>

                        </div>

                    </div>

                    <div class="d-flex  flex-row-reverse">       
                        <button class="btn btn-warning mr-4 mt-2 pr-4 pl-4 mb-2" type="submit" form="statut_form">Update</button>                       
                    </div>
                
                </div>

                    
                @endforeach
          
            </div>
        </div>

@endsection




