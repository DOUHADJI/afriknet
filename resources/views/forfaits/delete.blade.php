@extends('forfaits.layout');

@section('content')
    



    <div class="container">


        @if ($message = Session::get('success'))

            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">

                <p> <span class="bi-check-circle-fill mr-1 fa-2x"></span>{{ $message }}</p>
                
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>    

        @endif


        @if ($forfaits->count() == 0 )

                <div class="alert alert-primary  fade show text-center" role="alert">

                    <p> <span class="fas fa-sad-tear mr-1 fa-2x"></span>Aucun forfait disponible</p>
                    

                </div>  
                
                @else



        <div class="row row-cols-3">

        @foreach ($forfaits as $forfait )
        
            <div class="col">

                <div class="card border-left-success  shadow  py-2 mt-3 mb-3  position-relative ">

                    
                        <button type="submit" form="myform"  class="position-absolute top-0 start-100 translate-middle badge rounded-pill  border border-primary bg-primary">
                            <span class="bg-primary">
                                <span class="fas fa-minus fa-1x  ml-1 mr-1 "></span>
                                <span >
                                    <form action="{{route ("forfaits.destroy", $forfait )}}" method="POST"  id="myform" class="visually-hidden">
                                        @csrf
                                        @method("DELETE")
                                    </form>

                                </span>
                              </span>
                            </button>

                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">

                                <div class="text-xs  text-primary text-uppercase mb-1">
                                    forfait : <b class="h5 font-weight-bold ">{{$forfait->nom}}</b></div>
                                <div class=" mb-0 font-weight-bold text-gray-800">Volume :
                                     <b class="h5 font-weight-bold ">{{$forfait->volume}}Go <span>   </span>
                                       <span class="text-xs  text-success text-uppercase mb-1">validité :</span> {{$forfait->validite}}</b>
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

    @endforeach
    
           </div>
    </div>


    @endif



@endsection