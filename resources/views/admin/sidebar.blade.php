<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }} </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">




    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProces"
            aria-expanded="true" aria-controls="collapseProces">
            <i class="fas fa-fw fa-wrench"></i>
            <span>About</span>
        </a>
        <div id="collapseProces" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.abouts.index') }}">All About</a>
                <a class="collapse-item" href="{{ route('admin.abouts.create') }}">Add About</a>
                <a class="collapse-item" href="{{ route('admin.abouts.trash') }}">Trash</a>

            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout"
            aria-expanded="true" aria-controls="collapseAbout">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Proces</span>
        </a>
        <div id="collapseAbout" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.proces.index') }}">All Proces</a>
                <a class="collapse-item" href="{{ route('admin.proces.create') }}">Add Proces</a>
                <a class="collapse-item" href="{{ route('admin.proces.trash') }}">Trash</a>

            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTestimonial"
            aria-expanded="true" aria-controls="collapseTestimonial">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Testimonial</span>
        </a>
        <div id="collapseTestimonial" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.testimonials.index') }}">All Testimonial</a>
                <a class="collapse-item" href="{{ route('admin.testimonials.create') }}">Add Testimonial</a>
                <a class="collapse-item" href="{{ route('admin.testimonials.trash') }}">Trash</a>

            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNeew"
            aria-expanded="true" aria-controls="collapseNeew">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Neew</span>
        </a>
        <div id="collapseNeew" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.neews.index') }}">All Neew</a>
                <a class="collapse-item" href="{{ route('admin.neews.create') }}">Add Neew</a>
                <a class="collapse-item" href="{{ route('admin.neews.trash') }}">Trash</a>

            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProject"
            aria-expanded="true" aria-controls="collapseProject">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Project</span>
        </a>
        <div id="collapseProject" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.projects.index') }}">All Project</a>
                <a class="collapse-item" href="{{ route('admin.projects.create') }}">Add Project</a>
                <a class="collapse-item" href="{{ route('admin.projects.trash') }}">Trash</a>

            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
