@extends('clients.layout')


@section("pageTitle")
    Liste des clients
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
                            <th>Client's statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($clients as $client )

                            <tr>
                                <td> <b>{{$client->name}}</b>  {{$client->prenom}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->contact}}</td>
                                <td>{{$client->type}}</td>
                                <td>
                                        @if($client->statut_activite == 1)
                                            <span class="badge badge-success py-2 px-4 ">Active</span>
                                            @else
                                            <span class="badge badge-danger  py-2 px-4">Inactive</span>

                                        @endif
                                </td>

                                <td>

                                    <small class="container-fluid">
                                        <div class="row">

                                          <div class="col-lg-6 mb-2">
                          
                                          <a class="btn btn-secondary" href="{{route("clients.edit", $client )}}"><span class="fas fa-edit"></span></a>
                          
                                          </div>

                                          <div class="col-lg-6 ">
                          
                                            <a class="btn btn-success" href="{{route("clients.show", $client )}}"><span class="fas fa-eye"></span></a>
                            
                                            </div>
                          
                          
                                          <div class="col-lg-12 mt-2 text-center" >
                                            <a   href="{{route("clients.showForDeletion", $client)}}" type="button" class="btn btn-danger" {{-- data-bs-toggle="modal" data-bs-target="#staticBackdrop" --}}>
                                                <span class="fas fa-trash"></span>
                                            </a>
                                          </div>

                                        </div>
                                           
                                      </small>

                                </td>
                            </tr>

                        @endforeach
                        
                                            </tbody>
                </table>

                


@endsection


