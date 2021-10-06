

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Global<sup>.net</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Espace marketing
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-wifi"></i>
            <span>Abonnements</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions sur  abonnements</h6>
                <a class="collapse-item" href="{{route ('abonnements.index') }}">Nos abonnements</a>
                <a class="collapse-item" href="{{route ("abonnements.create") }}">+ nouvel abonnement</a>
                <a class="collapse-item" href="{{route ("abonnements.showForDelete")}}">- retirer un abonnement</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-grip-lines"></i>
            <span>Forfaits</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions sur  forfaits</h6>
                <a class="collapse-item" href="{{route ('forfaits.index') }}">Nos forfaits</a>
                <a class="collapse-item" href="{{route ("forfaits.create") }}">+ nouveau forfait</a>
                <a class="collapse-item" href="{{route ("forfaits.showForDelete")}}">- retirer un forfait</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
            aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-chart-area"></i>
            <span>Bilans</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Bilan marketing</h6>
                <a class="collapse-item" href="{{route ('forfaits.index') }}">Nos forfaits</a>
                <a class="collapse-item" href="{{route ("forfaits.create") }}">+ nouveau forfait</a>
                <a class="collapse-item" href="{{route ("forfaits.showForDelete")}}">- retirer un forfait</a>
            </div>
        </div>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Gestion de la clientèle
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseclients"
            aria-expanded="true" aria-controls="collapseclients">
            <i class="fas fa-users"></i>
            <span>Clients</span>
        </a>
        <div id="collapseclients" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions sur clients</h6>
                <a class="collapse-item" href="{{route('clients.index')}}">Liste des clients</a>
                <a class="collapse-item" href="{{route('clients.create')}}">+ nouveau client</a>
                <a class="collapse-item" href="{{route('clients.statuts')}}">Change client's statut</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->

{{--     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
            aria-expanded="true" aria-controls="collapse3">
            <i class="fas fa-clipboard-list"></i>
            <span>Plaintes</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions sur plaintes</h6>
                <a class="collapse-item" href="{{route('clients.index')}}">Non traitées</a>
                <a class="collapse-item" href="{{route('clients.create')}}">Urgentes</a>
                <a class="collapse-item" href="{{route('plaintes.archives')}}">Archives</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link" href="{{route('plaintes.index')}}">
            <i class="fas fa-clipboard-list"></i>
            <span>Plaintes</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('requetes.index')}}">
            <i class="fas fa-comments"></i>
            <span>Requêtes</span></a>
    </li>


    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4"
            aria-expanded="true" aria-controls="collapse4">
            <i class="fas fa-comments"></i>
            <span>Requêtes</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions sur requêtes</h6>
                <a class="collapse-item" href="{{route('clients.index')}}">Non traitées</a>
                <a class="collapse-item" href="{{route('clients.create')}}">Urgentes</a>
                <a class="collapse-item" href="{{route('clients.statuts')}}">Archives</a>
            </div>
        </div>
    </li> --}}
  {{--   <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Abonnements</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

 

</ul>