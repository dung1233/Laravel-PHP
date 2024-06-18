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
                            @if($notification->data['type'] == 'approved')
                            <i class="fa-solid fa-check-circle" style="color: forestgreen;"></i>
                            @elseif($notification->data['type'] == 'like')
                            <i class="fa-solid fa-heart"></i>
                            @elseif($notification->data['type'] == 'comment')
                            <i class="fa-solid fa-comment"></i>
                            @endif
                        </div>
                        <p style="margin: 12px 5px 5px 5px;">{{ $notification->data['entry_name'] ?? 'Bài viết' }} đã được duyệt!</p>
                    </div>
                    @endif
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