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
                        @endif
                        <div class="notification-text" style="margin: 47px 0px 0px -15px">
                            @if($notification->data['type'] == 'accepted')
                                <i class="fa-solid fa-check-circle" style="color: forestgreen;"></i>
                            @elseif($notification->data['type'] == 'rejected')
                                <i class="fa-solid fa-times-circle" style="color: red;"></i>
                            @elseif($notification->data['type'] == 'like')
                                <i class="fa-solid fa-heart" style="color: #ed1e45;"></i>
                            @elseif($notification->data['type'] == 'comment')
                                <i class="fa-solid fa-comment" style="color: forestgreen;"></i>
                            @elseif($notification->data['type'] == 'ticket_purchased')
                                
                            @endif
                        </div>
                        <p style="margin: 12px 5px 5px 5px;">
                            @if($notification->data['type'] == 'accepted')
                                {{ $notification->data['entry_name'] ?? 'Bài viết' }} đã được duyệt!
                            @elseif($notification->data['type'] == 'rejected')
                                {{ $notification->data['entry_name'] ?? 'Bài viết' }} đã bị từ chối!
                            @elseif($notification->data['type'] == 'like')
                                {{ $notification->data['entry_name'] ?? 'Bài viết' }} đã được thích!
                            @elseif($notification->data['type'] == 'comment')
                                {{ $notification->data['entry_name'] ?? 'Bài viết' }} đã được bình luận!
                            @elseif($notification->data['type'] == 'ticket_purchased')
                                Vé {{ $notification->data['ticket_name'] ?? 'sự kiện' }} đã được mua thành công!
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
                @auth
    <li >
        <a class="dropdown-item" href="{{ route('password.change') }}">{{ __('Đổi Mật Khẩu') }}</a>
    </li>
@endauth
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                @include('student.Menu');
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


                    <div class="card mb-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"></path>
                                </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                                Bài Đăng
                            </div>
                            <div class="card-body">
                                <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                    <div class="datatable-top">
                                        <div class="datatable-dropdown">
                                            <label>
                                                <select class="datatable-selector">
                                                    <option value="5">5</option>
                                                    <option value="10" selected="">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                </select> entries per page
                                            </label>
                                        </div>
                                        <div class="datatable-search">
                                            <input class="datatable-input" placeholder="Search..." type="search" title="Search within table" aria-controls="datatablesSimple">
                                        </div>
                                    </div>
                                    <div class="datatable-container">
                                        <table id="datatablesSimple" class="datatable-table">
                                            <thead>
                                                <tr>
                                                    <th data-sortable="true" style="width: 19.60958296362023%;"><a href="#" class="datatable-sorter">Tên</a></th>
                                                    <th data-sortable="true" style="width: 15.616681455190772%;"><a href="#" class="datatable-sorter">Hình ảnh</a></th>
                                                    <th data-sortable="true" style="width: 9.139307897071872%;"><a href="#" class="datatable-sorter">Ngày tạo</a></th>
                                                    <th data-sortable="true" style="width: 15.173025732031945%;"><a href="#" class="datatable-sorter">Loại</a></th>
                                                    <th data-sortable="true" style="width: 8.173025732031945%;"><a href="#" class="datatable-sorter">Sửa</a></th>
                                                    <th data-sortable="true" style="width: 8.173025732031945%;"><a href="#" class="datatable-sorter">Xóa</a></th>
                                                    <th data-sortable="true" style="width: 11.173025732031945%;"><a href="#" class="datatable-sorter">Trạng thái</a></th>
                                                </tr>
                                            </thead>

                                            @forelse ($entries as $entry)
                                            <tr>
                                                <td>{{ $entry->name }}</td>
                                                <td><img src="{{ asset($entry->image_path) }}" width="100" alt="Product Image"></td>
                                                <td>{{ $entry->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $entry->exhibition->Title ?? 'Không xác định' }}</td>
                                                <td>
                                                    <a href="{{ route('event.edit', $entry->id) }}" class="btn btn-primary">Sửa</a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('event.destroy', $entry->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                                <td>{{ $entry->status }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7">Không có bài đăng nào.</td>
                                            </tr>
                                            @endforelse
                                        </table>
                                    </div>
                                    <div class="datatable-bottom">
                                        <div class="datatable-info">Showing 1 to 10 of 10 entries</div>
                                        <nav class="datatable-pagination">
                                            <ul class="datatable-pagination-list"></ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Kiểm tra xem có thông báo chưa đọc không
            var unreadNotifications = @json(auth()->user()->unreadNotifications);

            if (unreadNotifications.length > 0) {
                document.querySelector('.notification-icon .badge').style.display = 'block';
            }

            // Khi người dùng click vào biểu tượng chuông, đánh dấu tất cả thông báo là đã đọc
            document.querySelector('.notification-icon').addEventListener('click', function() {
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