@extends('clients.layout')

@section("pageTitle")
    Demandes d'activation
@endsection

@section('content')

    <!-- DataTales clients -->

    @if ($message = Session::get('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        <p> <span class="bi-check-circle-fill mr-1 fa-2x"></span>{{ $message }}</p>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>    

    @endif

    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste des clients</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name </th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Type</th>
                            <th>Change client's statut</th>
                           
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($clients as $client )
                            @if ($client->statut_activite==1)

                            @else
                            <tr class="text-danger">
                                <td> <b>{{$client->name}}</b>  {{$client->prenom}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->contact}}</td>
                                <td>{{$client->type}}</td>
                                <td class="text-center">
                                   <form action="{{route("clients.activate_account")}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                       <input type="number" name="statut" id="" value="{{ 1 }}" hidden>
                                       <input type="number" name="user_id" value="{{ $client-> id }}" hidden>
                                       <button type="submit" class="btn btn-danger">
                                        <span class=" py-3 px-4 col ">
                                           Activate account
                                        </span>
                                       </button>
                                   </form>
                                </td>

                        

                            </tr>
                            @endif

                        @endforeach
                        
                                            </tbody>
                </table>

 
@endsection


