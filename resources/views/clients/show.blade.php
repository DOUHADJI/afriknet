@extends("clients.layout")

@section('pageTitle')
    détails sur le client
@endsection

@section('content')

   <div class="row bg-gray-200  mb-4 p-3">

    

       <div class="col-lg-8 col-md-8">

        <div class=" mb-4 ">

            <div class=" mb-5">
                    <span class="fas fa-user fa-2x @if($client->statut_activite === 1)
                        text-success
                        @else
                        text-danger
                    @endif"></span>
                    <span class="ml-3"> {{$client->type}}</span>
                    <span class="ml-5"> @if($client->statut_activite === 1)
                       <span class="badge badge-success py-1 px-3">Active</span> 
                       @else
                       <span class="badge badge-danger py-1 px-3">Inactive</span> 

                    @endif</span>
            </div>

            <div class=" ">
                    <div class="row">
                        <p class="{{-- col-auto --}} ml-2">  Nom : <b><em>{{$client->name}}</em></b></p>
                        <p class="{{-- col-auto --}} ml-2"> Prénom(s) : <b><em>{{$client->prenom}}</em></b></p>
                        <p class="{{-- col-auto --}} ml-2"> Pays : <b><em>{{$client->pays}}</em></b></p>
                        <p class="{{-- col-auto --}} ml-2"> Ville :  <b><em>{{$client->ville}}</em></b></p>

                    </div>

                    <div class="row">
                        <p class=" col ml-2 badge badge-secondary py-2"> Contact :  <b><em>{{$client->contact}}</em></b></p>
                        <p class=" col ml-2  badge badge-secondary py-2"> Email :  <b><em>{{$client->email}}</em></b></p>
                    </div>

                    


            </div>


        </div>

       </div>

  


       
   </div>

   <div class="row">

    <div class="col-12 mb-5 bg-gray-800 p-3  text-white" @if($client->type === "Entreprise" || $forfaits->count() === 0) hidden @endif >

        <p class="text-center fs-5 w-100 bg-light text-gray-800">
            Forfaits effectués
        </p>

        <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0">

            <thead>
                <tr   >
                    <th class="bg-gray-800">Nom</th>
                    <th>Payement</th>
                    <th>Montant</th>
                    <th>Souscri le </th>
                    <th>Fini le</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($forfaits as $abonnement )
                        <td>{{ $abonnement->nom }}</td>
                        <td>Mobile</td>
                        <td>{{ $abonnement->price }} Fcfa</td>
                        <td>{{ $abonnement->souscri_le }}</td>
                        <td>{{ $abonnement->fini_le }}</td>
                @endforeach
            </tbody>

        </table>

   

    </div>

    <div class="col-12 mb-5 bg-gray-800 p-3  text-white" @if( $abonnements->count() === 0) hidden @endif >

        <p class="text-center fs-5 w-100 bg-light text-gray-800">
            Abonnements effectués
        </p>

        <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0">

            <thead>
                <tr   >
                    <th class="bg-gray-800">Nom</th>
                    <th>Payement</th>
                    <th>Montant</th>
                    <th>Souscri le </th>
                    <th>Fini le</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($abonnements as $abonnement )
                        <td>{{ $abonnement->nom }}</td>
                        <td>Mobile</td>
                        <td>{{ $abonnement->price }} Fcfa</td>
                        <td>{{ $abonnement->souscri_le }}</td>
                        <td>{{ $abonnement->fini_le }}</td>
                @endforeach
            </tbody>

        </table>

   

    </div>


</div>
@endsection