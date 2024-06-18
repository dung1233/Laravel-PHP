<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <!-- Magnific Popup core CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css2/bootstrap.min.css">
    <link rel="stylesheet" href="css2/style.css">
    <title>GIGIMAIL-Nghệ Thuật </title>
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
                            <a class="nav-link" href="#"><img src="/images/GIGAMAIL.png" alt="Vista Pro" style="width: 25%" /></a>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav float-right menu-links">
                        <li class="nav-item">
                            <a class="nav-link " href="/">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.Event') }}">Event</a>
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
                <img class="d-block w-100 home-bg" alt="home-bg" src="images/event1.webp">
                <div class="carousel-caption d-md-block">
                    <p class="frst-hrd">Everyone is Photogenic</p>
                    <h5>Today’s SPECIAL MOMENTS.</h5>
                    <p>Creating a timeless look, coupled with a flawless moment</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 home-bg" alt="home-bg" src="images/event.webp">
                <div class="carousel-caption d-md-block">
                    <p class="frst-hrd">Everyone is Photogenic</p>
                    <h5>Today’s SPECIAL MOMENTS.</h5>
                    <p>Creating a timeless look, coupled with a flawless moment</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 home-bg" alt="home-bg" src="images/home-bg.png">

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



    </div>
    <div class="container-fluid fh5co-about-us" id="about-us">
        <div class="olw">
            <h3><b>CHÀO MỪNG CÁC BẠN ĐẾN VỚI SỰ KIỆN THƯỜNG NIÊN</b></h3>
            <h5> Cuộc Thi Triển lãm Nghệ Thuật Hàng Năm</h5>
        </div>
        <div class="ola">
            <p>Đây là cơ hội tuyệt vời để chứng kiến sự tranh tài đầy kịch tính và sáng tạo của các tài năng hàng đầu. Hãy cùng chúng tôi trải nghiệm những khoảnh khắc đáng nhớ, nơi nghệ thuật và đam mê hội tụ. Chúng tôi rất hân hạnh được đón tiếp các bạn và mong rằng các bạn sẽ có một trải nghiệm thật tuyệt vời tại sự kiện năm nay!</p>
        </div>
        <div class="olp">
            <div class="op">
                <img src="//theme.hstatic.net/200000815177/1001198826/14/artligtimgsimg1.png?v=2792" width="45%">
            </div>
            <div class="op">
                <img src="https://w.ladicdn.com/s500x500/64c8b695d2dde0001254fdd1/3-vnm-20231114030946-oxj1h.png" width="50%">

            </div>
            <div class="op">
                <img src="	https://w.ladicdn.com/s500x500/64c8b695d2dde0001254fdd1/2-vnm-20231114030945-uc9h1.png" width="50%">
            </div>
        </div>
        <br>
        @php
        $latestExhibition = $exhibitions->sortByDesc('ExhibitionID')->first();
        @endphp
        @if ($latestExhibition)
        <div class="zxc">
            <div class="axca">
                <h2><b>{{ $latestExhibition->Title }}</b></h2>
                <p style="color: white;"">Bắt đầu một cuộc thi đa giác quan độc đáo tại GIGAMAIL, nơi nghệ thuật và công nghệ hoà quyện. Cuộc thi này mời gọi các sinh viên sáng tạo ra những tác phẩm kết hợp giữa nghệ thuật cổ điển và công nghệ hiện đại như màn chiếu kỹ thuật số, công nghệ thực tế ảo, 3D mapping. Các sinh viên sẽ tham gia tranh tài để trình bày những ý tưởng sáng tạo của mình, mang đến trải nghiệm đầy thú vị và mới mẻ cho khán giả. Người tham gia, bao gồm cả sinh viên trong trường và người ngoài, đều có cơ hội bình chọn ai sẽ là người thắng cuộc. Đây là dịp để các nghệ sĩ trẻ khám phá, thể hiện tài năng và mở rộng tầm nhìn về nghệ thuật đương đại.</p>
        <a href=" {{ route('sukien') }}" class="round-button"><b>Tham Gia</b></a>
            </div>
            <div class="axc">
                <img src="images/home1.jpg" alt="" srcset="" width="100%">
            </div>
        </div>
        <div>
        </div>
    </div>

    <div class="container-fluid fh5co-portfolio" id="portfolio">

        <div class="container">
            <div class="container">
                @php
                $latestExhibition = $exhibitions->sortByDesc('ExhibitionID')->first();
                @endphp
                <div class="ikm">
                    @if ($latestExhibition)
                    <h1 style="color: orange; font-size: 3rem;"><b>{{ $latestExhibition->Title }}</b></h1>
                </div>
                <!-- <p>{{ $latestExhibition->Description }}</p> -->
                <div class="details">
                    <div>
                        <i class="fas fa-calendar-alt"></i>
                        <p>Ngày Bắt Đầu:</p>
                        <p>{{ $latestExhibition->StartDate->format('d/m/Y H:i') }}</p>
                    </div>
                    <div>
                        <i class="fas fa-clock"></i>
                        <p>Thời Gian Bình Chọn</p>
                        <p>Thứ 2-CN</p>
                    </div>
                    <div>
                        <i class="fas fa-calendar-check"></i>
                        <p>Ngày Kết Thúc:</p>
                        <p>{{ $latestExhibition->EndDate ? $latestExhibition->EndDate->format('d/m/Y H:i') : 'Chưa xác định' }}</p>
                    </div>
                    <div>
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Địa Điểm Tổ Chức:</p>
                        <p>{{ $latestExhibition->Location }}</p>

                    </div>
                </div>
                <!-- <div class="ikn">
                    <div class="ikb">
                        <div><img src="icon/icon-calendar-20231107042404-tnwba.png" alt="" srcset=""></div>
                        <div>
                            <h3><b>Ngày bắt đầu:<br>
                                    <p>{{ $latestExhibition->StartDate->format('d/m/Y H:i') }}</p>
                                </b></h3>
                        </div>
                    </div>
                    <div class="ikb">
                        <div><img src="icon/icon-clock-20231107042421-rkntj.png" alt=""></div>
                        <div>
                            <h3><b>Thời Gian Bình Chọn</b></h3>
                        </div>
                    </div>
                    <div class="ikb">
                        <div> <img src="icon/icon-time-20231107043518-b5rj6.png" alt="" srcset=""></div>
                        <div>
                            <h3><b>Ngày kết thúc:<br>
                                    <p>{{ $latestExhibition->EndDate ? $latestExhibition->EndDate->format('d/m/Y H:i') : 'Chưa xác định' }}</p>
                                </b></h3>
                        </div>
                    </div>
                    <div class="ikb">
                        <img src="icon/icon-location-20231107042453-b1kzc.png" alt="">
                        <h3><b>Địa Đỉa Tổ Chức:<br>
                                <p>{{ $latestExhibition->Location }}</p>
                            </b></h3>
                    </div>
                    @endif
                </div> -->

            </div>
            @endif
            <br>
            <div class="rowaa">
                <div class="portfolioContainer">
                    @foreach($entries as $entry)
                    @if($entry->status == 'accepted')
                    <div class="gallary building nature green"> <!-- Giữ nguyên class để không làm mất cấu trúc -->
                        <img src="{{ asset($entry->image_path) }}" alt="{{ $entry->name }}">
                        <div class="card-img-overlay">
                            <div class="top-buttons clearfix">

                                <a href="#" class="like-button" data-id="{{ $entry->id }}" data-liked="{{ $entry->likes->where('user_id', Auth::id())->count() > 0 ? 'true' : 'false' }}">
                                    <span class="img-icon"><img src="{{ asset('images/heart.png') }}" class="{{ $entry->likes->where('user_id', Auth::id())->count() > 0 ? 'liked' : '' }}" alt="heart icon" /></span>
                                    <span class="txt">{{ $entry->likes->count() }} Like</span>
                                </a>
                            </div>
                            <div class="top-buttons bottom-buttons clearfix">
                                <a href="{{ route('entries.show', ['id' => $entry->id]) }}"><span class="txt">Contact Now</span></a>
                                <a href="{{ asset($entry->image_path) }}" class="image-link">
                                    <span class="img-icon"><img src="{{ asset('images/eye.png') }}" alt="eye icon" /></span>
                                    <span class="txt">Full View</span>
                                </a>

                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
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
                            <span class="email"><img src="images/email.png" alt="email icon" /></span><b>contact@example.com</b>
                        </p>
                        <p>
                            <span class="phone"><img src="images/phone.png" alt="phone icon" /></span><b>+123-456-7890</b>
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


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Owl Carousel JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <!-- Magnific Popup JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

        <!-- Custom JS -->
        <script src="js2/isotope-docs.min.js"></script>
        <script src="js2/main.js"></script>
        <script>
            $(document).ready(function() {
                $('.image-link').magnificPopup({
                    type: 'image'
                });
            });
            $(document).ready(function() {
                $('.like-button').click(function(e) {
                    e.preventDefault();

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
                            if (xhr.status === 403) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi',
                                    text: xhr.responseJSON.error,
                                    confirmButtonText: 'OK'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi',
                                    text: 'Đã xảy ra lỗi. Vui lòng thử lại sau.',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    });
                });
            });
        </script>

</body>

</html>