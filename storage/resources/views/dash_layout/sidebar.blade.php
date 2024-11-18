      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center mb-4" href="index.html">
     
    <!-- rotate-n-15 -->
    <div class="sidebar-brand-icon ">
       <!-- <i class="fa fa-money-bill"></i>-->
        <img src="/logo.png" alt="" class="mt-4 " style="height:160px">
    </div>
   <!-- <div class="sidebar-brand-text mx-3">SACCOSS </div>-->
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Activity
</div>

<!-- Nav Item - Pages Collapse Menu -->

<!-- Users -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users:</h6>
            <a class="collapse-item" href="{{route('users_management.index')}}">Manage Users</a>
            <a class="collapse-item" href="cards.html">Inactive User</a>
        </div>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2"
        aria-expanded="true" aria-controls="collapseTwo2">
        <i class="fas fa-fw fa-cog"></i>
        <span>Shares/Hisa</span>
    </a>
    <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">manage:</h6>
            <a class="collapse-item" href="{{ route('shares_management.index')}}">View/Manage Shares</a>
            <a class="collapse-item" href="{{route('all.applicant.shares')}}">View applicant shares</a>
        </div>
    </div>
</li>

<!-- saving -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3"
        aria-expanded="true" aria-controls="collapseTwo2">
        <i class="fas fa-fw fa-cog"></i>
        <span>Saving/Akiba</span>
    </a>
    <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">manage:</h6>
            <a class="collapse-item" href="{{ route('savings_management.index')}}">View/Manage Savings</a>
            <a class="collapse-item" href="{{route('all.applicant.saving')}}">View applicant savings</a>
        </div>
    </div>
</li>


<!-- deposite -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo4"
        aria-expanded="true" aria-controls="collapseTwo2">
        <i class="fas fa-fw fa-cog"></i>
        <span>Deposite/Amana</span>
    </a>
    <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">manage:</h6>
            <a class="collapse-item" href="{{ route('deposites_management.index')}}">View/Manage Deposit</a>
            <a class="collapse-item" href="{{route('all.applicant.deposite')}}">View applicant deposit</a>
        </div>
    </div>
</li>

<!-- mkopo -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo5"
        aria-expanded="true" aria-controls="collapseTwo2">
        <i class="fas fa-fw fa-cog"></i>
        <span>Loan/Mkopo</span>
    </a>
    <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">manage:</h6>
            <a class="collapse-item" href="{{ route('loans_management.index')}}">View/Manage Loan</a>
            <a class="collapse-item" href="{{route('all.applicant.loan')}}">View applicant loan</a>
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->