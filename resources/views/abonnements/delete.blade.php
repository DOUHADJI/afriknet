@extends('abonnements.layout')

@section('content')
    



    <div class="container">


        @if ($message = Session::get('success'))

            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">

                <p> <span class="bi-check-circle-fill mr-1 fa-2x"></span>{{ $message }}</p>
                
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>    

        @endif


        @if ($abonnements->count() == 0 )

                <div class="alert alert-primary  fade show text-center" role="alert">

                    <p> <span class="fas fa-sad-tear mr-1 fa-2x"></span>Aucun abonnement disponible</p>
                    

                </div>  
                
                @else

                



        <div class="row {{-- row-cols-3 --}}">

        @foreach ($abonnements as $abonnement )
        
            <div class="col-4">

                <div class="card border-left-success  shadow  py-2 mt-3 mb-3  position-relative ">

                    
                        <button type="submit" form="{{$abonnement->nom}}"  
                            data-bs-toggle="modal" data-bs-target="#{{$abonnement->nom}}"
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill  border border-primary bg-primary">
                            <span class="bg-primary">
                                <span class="fas fa-minus fa-1x  ml-1 mr-1 "></span>
                                <span >
                                   
                                </span>
                              </span>
                            </button>

                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">

                                <div class="text-xs  text-primary text-uppercase mb-1">
                                    Abonnement : <b class="h5 font-weight-bold ">{{$abonnement->nom}}</b></div>
                                <div class=" mb-0 font-weight-bold text-gray-800">Volume :
                                     <b class="h5 font-weight-bold ">{{$abonnement->volume}}Go <span>   </span>
                                       <span class="text-xs  text-success text-uppercase mb-1">validité :</span> {{$abonnement->validite}}</b>
                                       <span class="text-xs  text-success  mb-1">jours</span>
                                    </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-wifi fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="{{$abonnement->nom}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="  text-xs" id="staticBackdropLabel">Delete abonnement ?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <p class="text-danger">You are about to delete the abonnement  !</p>
                        <div class="card border-left-success  shadow  py-2 mt-3 mb-3 ">

                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
        
                                        <div class="text-xs  text-primary text-uppercase mb-1">
                                            Abonnement : <b class="h5 font-weight-bold ">{{$abonnement->nom}}</b></div>
                                        <div class=" mb-0 font-weight-bold text-gray-800">Volume :
                                             <b class="h5 font-weight-bold ">{{$abonnement->volume}}Go <span>   </span>
                                               <span class="text-xs  text-success text-uppercase mb-1">validité :</span> {{$abonnement->validite}}</b>
                                               <span class="text-xs  text-success  mb-1">jours</span>
                                            </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-wifi fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
                      <form action="{{ route("abonnements.destroy", $abonnement) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger" >delete</button>
                      </form>
      
                    </div>
                  </div>
                </div>
            </div>
           


    @endforeach
    
           </div>
    </div>


    @endif



@endsection