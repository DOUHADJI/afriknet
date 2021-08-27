@extends('clients.layout')


@section('content')

    <!-- DataTales clients -->

    @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

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

                                          <div class="col-4">
                          
                                          <a class="btn btn-secondary" href="{{route("clients.edit", $client )}}"><span class="fas fa-edit"></span></a>
                          
                                          </div>

                                          <div class="col-4">
                          
                                            <a class="btn btn-success" href="{{route("clients.show", $client )}}"><span class="fas fa-eye"></span></a>
                            
                                            </div>
                          
                          
                                          <div class="col-4">
                                             <form action="{{ route("clients.destroy", $client) }}" method="post">
                                              @csrf
                                              @method("DELETE")
                                              <button type="submit" class="btn btn-danger"><span class="fas fa-recycle"></span></button>
                                            </form>
                                          </div>
                                        </div>
                                           
                                      </small>

                                </td>
                            </tr>

                        @endforeach
                        
                                            </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


