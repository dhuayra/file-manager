<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">File Manager</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ empty(Request::segment(1)) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <span>{{__('Home')}}</span>
        </a>
    </li>
    
    <hr class="sidebar-divider">

    <div class="sidebar-heading">{{__('Options')}}</div>

    <li class="nav-item {{ Request::segment(1) === 'generatePDF' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('generatePdf')}}">
            <span>{{ __('Generate PDF')}}</span>
        </a>
    </li>
    <li class="nav-item {{ Request::segment(1) === 'files' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('files')}}">
            <span>{{ __('Import File')}}</span>
        </a>
    </li>
    <li class="nav-item {{ Request::segment(1) === 'datatables' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dataTables')}}">
            <span>{{ __('Data Tables')}}</span>
        </a>
    </li>
    
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>