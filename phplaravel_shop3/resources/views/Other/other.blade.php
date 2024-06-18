<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard {{ Auth::user()->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="/css/styles1.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
    .notification-icon {
        position: relative;
    }

    .notification-icon .badge {
        position: absolute;
        top: 0;
        right: 0;
        padding: 5px 10px;
        border-radius: 50%;
        background: red;
        color: white;
        display: none;
        /* Ẩn ban đầu */
    }
    
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">{{ Auth::user()->name }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle notification-icon" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-bell fa-2x"></i>
                <span class="badge">!</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li style="width: 300px;">
                    <div class="notifications">
                        @foreach (auth()->user()->notifications as $notification)
                            <li class="notification-item">
                                <div class="lolsa" style="display:flex;margin: 15px 0px 0px 10px;">
                                    @if (isset($notification->data['image_path']))
                                        <img src="{{ asset($notification->data['image_path']) }}" alt="Image" class="notification-image" width="84px" height="72px" style="border-radius: 38px;">
                                    <div class="notification-text" style="margin: 47px 0px 0px -15px">
                                       if($notification->data['type'] == 'ticket_purchased')
                                            <i class="fa-solid fa-ticket"></i>
                                        @endif
                                    </div>
                                    <p style="margin: 12px 5px 5px 5px;">
                                @if($notification->data['type'] == 'ticket_purchased')
                                    Vé  {{ $notification->data['ticket_name'] ?? 'sự kiện' }} đã được mua thành công!
                                @endif
                                        </p>
                                    
                                </div>
                                <div class="notification-text" style="margin-left: 5px;">
                                    <br>
                                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                            </li>
                        @endforeach
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</form>


        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Purchase History</a></li>
                    <li><a class="dropdown-item" href="#!">Order Status</a></li>
                    <li><a class="dropdown-item" href="#">Change your payment method</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                @include('other.Menu');
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Main</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Main</li>
                    </ol>


                   
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Kiểm tra xem có thông báo chưa đọc không
        var unreadNotifications = @json(auth()->user()->unreadNotifications);
        
        if (unreadNotifications.length > 0) {
            document.querySelector('.notification-icon .badge').style.display = 'block';
        }
        
        // Khi người dùng click vào biểu tượng chuông, đánh dấu tất cả thông báo là đã đọc
        document.querySelector('.notification-icon').addEventListener('click', function () {
            fetch('{{ route("notifications.read") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            }).then(response => {
                if (response.ok) {
                    document.querySelector('.notification-icon .badge').style.display = 'none';
                }
            });
        });
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/assets/demo/chart-area-demo.js"></script>
    <script src="/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="/js/datatables-simple-demo.js"></script>
</body>

</html>