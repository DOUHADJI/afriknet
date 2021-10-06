

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GLobal <sup>.net</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-user fa-tachometer-alt"></i>
            <span>My account</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
       Actions
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-plus"></i>
            <span>Souscrire</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Faire une souscription</h6>
                <a class="collapse-item" href="{{route ('abonnements.index') }}">abonnement</a>
                <a class="collapse-item" href="{{route ("abonnements.create") }}">Forfait</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.writte')}}">
            <i class="fas fa-comments"></i>
            <span>Writte  with us</span></a>
    </li>


   

    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Parameters
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseclients"
            aria-expanded="true" aria-controls="collapseclients">
            <i class="fas fa-money-check"></i>
            <span>Mes souscriptions</span>
        </a>
        <div id="collapseclients" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Voir mes souscriptions</h6>
                <a class="collapse-item" href="{{route('clients.index')}}">Abonnements</a>
                <a class="collapse-item" href="{{route('clients.create')}}">Forfaits</a>
            </div>
        </div>
    </li>






    <li class="nav-item">
        <a class="nav-link" href="{{route('user.modifier_infos')}}">
            <i class="fas fa-pencil-alt"></i>
            <span>Modifier mes informations</span></a>
    </li>




    <li class="nav-item">
        <a class="nav-link" href="{{route('user.faq')}}">
            <i class="fas fa-question-circle"></i>
            <span>FAQ</span></a>
    </li>

    
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

 

</ul>