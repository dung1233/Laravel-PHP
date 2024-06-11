<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="/owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css2/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css2/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Event</title>
</head>

<body>
    <div id="fh5co-hero-carousel" class="carousel slide header" data-ride="carousel">
        <nav class="navbar fixed-top navbar-expand-xl">
            <div class="container">
                <a class="navbar-brand mobile-logo" href="#"><img src="images/logo.png" alt="Vista Pro" /></a>
                <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse">
                    <span class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span> </button>
                <div id="my-nav" class="collapse navbar-collapse">
                    <div>
                        <ul class="navbar-nav mx-auto logo-desktop">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><img src="/images/logo.png" alt="Vista Pro" /></a>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav float-right menu-links">
                        <li class="nav-item">
                            <a class="nav-link " href="/">Trang Chủ</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('storeExhibition') }}">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tickets.create') }}">Mua vé</a>
                        </li>


                        @auth
                        @if(Auth::user()->UserType === 2)
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profile.student') }}"></i> {{ Auth::user()->name }}</a>
                        </li>
                        @elseif(Auth::user()->UserType === 3)
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profile.external') }}"></i> {{ Auth::user()->name }}</a>
                        </li>
                        @elseif(Auth::user()->TypeID === null)
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="icon fa fa-user"></i> {{ Auth::user()->name }}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="icon fa fa-user"></i> {{ Auth::user()->name }}</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"></i> Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="icon fa fa-check"></i> Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="icon fa fa-lock"></i> Login</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 home-bg" alt="home-bg" src="/images/event1.webp">
                <div class="carousel-caption d-md-block">
                    <p class="frst-hrd">Everyone is Photogenic</p>
                    <h5>Today’s SPECIAL MOMENTS.</h5>
                    <p>Creating a timeless look, coupled with a flawless moment</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 home-bg" alt="home-bg" src="/images/event.webp">
                <div class="carousel-caption d-md-block">
                    <p class="frst-hrd">Everyone is Photogenic</p>
                    <h5>Today’s SPECIAL MOMENTS.</h5>
                    <p>Creating a timeless look, coupled with a flawless moment</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 home-bg" alt="home-bg" src="/images/home-bg.png">

                <div class="carousel-caption d-md-block">
                    <p class="frst-hrd">Everyone is Photogenic</p>
                    <h5>Today’s SPECIAL MOMENTS.</h5>
                    <p>Creating a timeless look, coupled with a flawless moment</p>

                </div>
            </div>

        </div>
        <ul class="carousel-indicators">
            <li class="active" data-target="#fh5co-hero-carousel" data-slide-to="0" aria-current="location"></li>
            <li data-target="#fh5co-hero-carousel" data-slide-to="1"></li>
            <li data-target="#fh5co-hero-carousel" data-slide-to="2"></li>
        </ul>
    </div>
    @php
    $latestExhibition = $exhibitions->sortByDesc('ExhibitionID')->first();
    @endphp
    @if ($latestExhibition)
    <div class="cosyai">
        <div class="bigtail">
            <div class="contraiks">
                <div class="imageso">
                    <img src="/images/image.jpg" alt="" srcset="" width="100%">
                </div>
                <div style="margin: 10px;">
                    <br>
                    <h2 style="font-size: 1.25rem; color: rgb(255, 145, 77)"><b>{{ $latestExhibition->Title }}</b>

                    </h2>
                    @else
                    <h2>Không có sự kiện nào sắp diễn ra.</h2>
                    @endif
                    <p style="font-size: 1.35rem;">Đối Tượng Tham Gia Sự kiện </p>
                    <p style="color: white;">-Bạn Là sinh viên của trường (sinh viên mọi năm đều có thể tham gia)</p>
                    <p style="color: white;font-size: 1.25rem;"><b>Thể lệ Đăng ký</b></p>
                    <p style="color: white;">-Để tham gia sự kiện,sinh viên đăng nhập vào tài khoản cá nhân của trường để tham gia </p>
                    <p style="color: white;">-Nếu có xẩy ra vấn đề hãy liên hệ <a href="#">tại đây</a> hoặc chat trực tiếp với quản lý </p>
                    <br>
                    <h4 style="color: rgb(255, 145, 77);font-size: 1.25rem;"><b>Sự kiện có 2 vòng thi</b></h4>
                    <p>-Sinh viên khi gửi bài lên dự thi sẽ được hội đồng quản lý xét duyệt nếu tranh đủ điều kiện sẽ được thông qua</p>
                    <p>-Các bài được duyệt sẽ gửi lên 1 trang công khai để các mọi người lựa chọn
                        (bao gồm sinh viên trong trường và cả bên ngoài)
                        <br>
                        bài dự thi nào được nhiều like nhất khi kết thúc cuộc thi sẽ là người chiến thắng
                    </p>
                    <br>
                    <p style="color: rgb(255, 145, 77)">*Lưu ý:</p>
                    <p style="color: rgb(255, 145, 77)">-Tham gia sự kiện đúng giờ và ngày ghi trên page</p>
                    <p style="color: rgb(255, 145, 77)">-Mỗi sinh viên có thể gửi 1 bài dự thi duy nhất</p>
                    <p style="color: rgb(255, 145, 77)">-Bài của sinh viên khi gửi bài lên sẽ được xem xét qua có thể bị từ chối</p>
                    <p style="color: rgb(255, 145, 77)">-Phần thưởng sẽ trao cho người thắng cuộc sau 12 tiếng khi kết thúc cuộc thi</p>
                    <p style="color: rgb(255, 145, 77)">-Thí sinh có thể huỷ bài dự thi trước hoặc sau khi bài được đưa lên tham gia mà không cần qua người quản lý</p>
                    <br>
                </div>
            </div>
            <div class="contraik">
                <form action="{{ route('storeExhibition') }}" method="POST" enctype="multipart/form-data" class="fomrss">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên sản phẩm:</label>
                        <input type="text" id="name" name="name" placeholder="Nhập tên sản phẩm..." value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả:</label>
                        <textarea id="description" name="description" placeholder="Nhập mô tả sản phẩm...">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exhibition_id">Sự kiện:</label>
                        <select id="exhibition_id" name="exhibition_id">
                            <option value="" disabled selected>Chọn sự kiện</option>
                            @foreach ($exhibitions as $exhibition)
                            <option value="{{ $exhibition->ExhibitionID }}" {{ old('exhibition_id') == $exhibition->ExhibitionID ? 'selected' : '' }}>{{ $exhibition->Title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình ảnh:</label>
                        <input type="file" id="image" name="image">
                    </div>
                    <button class="butoon" type="submit">Gửi Sản Phẩm</button>
                </form>
            </div>
        </div>

    </div>



    <footer class="container-fluid fh5co-footer">
        <div class="container" id="contact">
            <div class="row">
                <div class="col-lg-5">
                    <h2>CONTACT US TODAY NOW</h2>
                    <p class="light">
                        If you are looking for a Photographer
                    </p>
                    <p>
                        <span class="email"><img src="/images/email.png" alt="email icon" /></span><b>contact@example.com</b>
                    </p>
                    <p>
                        <span class="phone"><img src="/images/phone.png" alt="phone icon" /></span><b>+123-456-7890</b>
                    </p>
                    <h3>We Are Social:</h3>
                    <ul class="navbar-nav float-left social-links footer-social">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/fh5co"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="https://twitter.com/fh5co"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-7">
                    <div class="form-box">
                        <h4>What would you like to talk about</h4>
                        <p>We'd Love to Hear From you !</p>
                        <hr />
                        <table class="table table-light table-borderless">
                            <tr>
                                <td><input type="text" class="form-control" placeholder="Name...">
                                </td>

                                <td><input type="text" class="form-control" placeholder="Email address">
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2"><textarea class="form-control" placeholder="You Message"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit">
                                        SUBMIT NOW
                                    </button>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </footer>
    <script>
        $(document).ready(function() {
            $('.like-button').click(function(e) {
                e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

                @if(!Auth::check())
                alert('Yêu cầu đăng nhập để thích mục này.');
                return;
                @endif

                var button = $(this);
                var entryId = button.data('id');
                var liked = button.data('liked') === 'true';
                var url = liked ? "{{ url('/entries') }}/" + entryId + "/unlike" : "{{ url('/entries') }}/" + entryId + "/like";

                console.log('Entry ID:', entryId);
                console.log('Liked:', liked);
                console.log('URL:', url);

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Success:', response);
                        if (response.status === 'liked') {
                            button.find('img').addClass('liked');
                            button.data('liked', 'true');
                        } else {
                            button.find('img').removeClass('liked');
                            button.data('liked', 'false');
                        }
                        button.find('.txt').text(response.likes_count + ' Likes');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        console.error('Response:', xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script src="js2/jquery.min.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="owl-carousel/owl.carousel.min.js"></script>
    <script src="js2/isotope-docs.min.js?6"></script>
    <script src="js2/main.js"></script>
</body>

</html>