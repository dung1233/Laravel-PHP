
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route ('profile.admin') }}">
<div class="sidebar-brand-icon rotate-n-15">
<i class="fas fa-laugh-wink"></i>
</div>
<div class="sidebar-brand-text mx-3">D Admin <sup>1</sup></div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
<a class="nav-link" href="index.html">
<i class="fas fa-fw fa-tachometer-alt"></i>
<span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
Interface
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
aria-expanded="true" aria-controls="collapseTwo">
<i class="fas fa-fw fa-cog"></i>
<span>Tạo sự kiện</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Tạo sự kiện triển lãm:</h6>
    <a class="collapse-item" href="{{ route('create.event') }}">Tổ chức Event</a>
    <a class="collapse-item" href="{{ route('events.history') }}">Lịch Sử</a>
</div>
</div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-wrench"></i>
<span>Điều Chỉnh</span>
</a>
<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Custom Utilities:</h6>
    <a class="collapse-item" href="{{ route('admin.prices.index') }}">Giá Tham gia Triển lãm</a>
    <a class="collapse-item" href="{{ route('xetduyet') }}">Xét duyệt bài</a>
</div>
</div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
Addons
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
aria-expanded="true" aria-controls="collapsePages">
<i class="fas fa-fw fa-folder"></i>
<span>Quản lý</span>
</a>
<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">QUản lý sinh viên :</h6>
    <a class="collapse-item" href="{{ route('admin.history') }}">DS sinh viên đăng bài</a>
    <a class="collapse-item" href="forgot-password.html">DS siên viên đoạt giải</a>
    <a class="collapse-item" href="forgot-password.html"></a>
    <div class="collapse-divider"></div>
    <h6 class="collapse-header">Quản lý :</h6>
    <a class="collapse-item" href="{{ route('purchase.history') }}">Danh sách người mua</a>
</div>
</div>
</li>
<!-- Nav Item - Charts -->
<li class="nav-item">
<a class="nav-link" href="{{ route('admin.chart') }}">
<i class="fas fa-fw fa-chart-area"></i>
<span>Charts</span></a>
</li>
<!-- Nav Item - Tables -->
<li class="nav-item">
<a class="nav-link" href="tables.html">
<i class="fas fa-fw fa-table"></i>
<span>Tables</span></a>
<li class="nav-item">
<a class="nav-link" href="{{ url('/') }}">
<i class="fas fa-fw fa-table"></i>
<span>Home</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
