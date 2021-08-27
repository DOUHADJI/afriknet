@extends("clients.layout")

@section('content')

   <div class="row">

       <div class="col-6">

        <div class="card shadow mb-4 ">

            <div class="card-header">
                    <span class="fas fa-user fa-3x @if($client->statut_activite === 1)
                        text-primary
                        @else
                        text-danger
                    @endif"></span>
                    <span class="ml-3"> {{$client->type}}</span>
                    <span class="ml-5"> @if($client->statut_activite === 1)
                       <span class="badge badge-success p-4">Active</span> 
                       @else
                       <span class="badge badge-danger p-2">Inactive</span> 

                    @endif</span>
            </div>

            <div class="card-body">
                    <div class="row">
                        <p>Nom : </p>
                        <p class="ml-2"> <b><em>{{$client->name}}</em></b></p>
                    </div>

                    <div class="row">
                        <p>Prenom(s) : </p>
                        <p class="ml-2"> <b><em>{{$client->prenom}}</em></b></p>
                    </div>

                    <div class="row">
                        <p>Pays : </p>
                        <p class="ml-2"> <b><em>{{$client->pays}}</em></b></p>
                    </div>

                    <div class="row">
                        <p>Ville : </p>
                        <p class="ml-2"> <b><em>{{$client->ville}}</em></b></p>
                    </div>
            </div>


        </div>

       </div>

       <div class="col-6">

        <div class="card shadow mb-4">

            <div class="card-header">
                    <span class="fas fa-phone fa-2x"></span>
                    <span> </span>
            </div>

            <div class="card-body">
                    <div class="row">
                        <p>Contact : </p>
                        <p class="ml-2"> <b><em>{{$client->contact}}</em></b></p>
                    </div>
            </div>


        </div>

        <div class="card shadow mb-4">

            <div class="card-header">
                    <span class="fas fa-envelope fa-2x"></span>
                    <span> </span>
            </div>

            <div class="card-body">
                    <div class="row">
                        <p>Email : </p>
                        <p class="ml-2"> <b><em>{{$client->email}}</em></b></p>
                    </div>
            </div>


        </div>

       </div>
   </div>

   <div class="row">

    <div class="col-6">

     <div class="card shadow mb-4 ">

         <div class="card-header">
                 <span class="fas fa-user fa-3x @if($client->statut_activite === 1)
                     text-primary
                     @else
                     text-danger
                 @endif"></span>
                 <span class="ml-3">Abonnements</span>
                 <span class="ml-5"> @if($client->statut_activite === 1)
                    <span class="badge badge-success p-4">Active</span> 
                    @else
                    <span class="badge badge-danger p-2">Inactive</span> 

                 @endif</span>
         </div>

         <div class="card-body">
                 <div class="row">
                     <p>Nom : </p>
                     <p class="ml-2"> <b><em>{{$client->name}}</em></b></p>
                 </div>

                 <div class="row">
                     <p>Prenom(s) : </p>
                     <p class="ml-2"> <b><em>{{$client->prenom}}</em></b></p>
                 </div>

                 <div class="row">
                     <p>Pays : </p>
                     <p class="ml-2"> <b><em>{{$client->pays}}</em></b></p>
                 </div>

                 <div class="row">
                     <p>Ville : </p>
                     <p class="ml-2"> <b><em>{{$client->ville}}</em></b></p>
                 </div>
         </div>


     </div>

    </div>

    <div class="col-6">

     <div class="card shadow mb-4">

         <div class="card-header">
                 <span class="fas fa-phone fa-2x"></span>
                 <span> </span>
         </div>

         <div class="card-body">
                 <div class="row">
                     <p>Forfaits </p>
                     <p class="ml-2"> <b><em>{{$client->contact}}</em></b></p>
                 </div>
         </div>


     </div>

     
    </div>
</div>
@endsection