<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('/adminasset/img/avatar-6.jpg') }}" alt="..."
                class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">Mahendra K</h1>
            <p>Software Developer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('admin.dashboard') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{ route('admin.category') }}"> <i class="icon-grid"></i>Category </a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Example dropdown </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>
    </ul>
</nav>
