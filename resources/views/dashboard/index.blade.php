        @extends('dashboard.layout')

                <!-- Begin Page Content -->

                @section('pageContent')
                
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                     


                    <!-- Content Row -->
                    <div class="row">

                         <!--Clients -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Clients</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$clients->count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        <!-- Abonnements -->
                     <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Plaintes</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$abonnements->count()}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                        <!-- Forfaits -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Forfaits (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$forfaits->count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-align-justify fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Content Row -->

                    <!-- Content Row -->
                    <div class="row">
                            Coming next
                    </div>

                </div>

                @endsection
                <!-- /.container-fluid -->
