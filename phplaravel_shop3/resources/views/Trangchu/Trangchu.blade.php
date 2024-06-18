<!doctype html>
<!--
	Photogenic by FreeHTML5.co
	URL: https://freehtml5.co
-->
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
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css2/bootstrap.min.css">
  <link rel="stylesheet" href="css2/style.css">

  <title>Photogenic - Free Portfolio Bootstrap Template</title>
</head>

<body>

  <div id="fh5co-hero-carousel" class="carousel slide header" data-ride="carousel">
    <nav class="navbar fixed-top navbar-expand-xl">
      <div class="container">
        <a class="navbar-brand mobile-logo" href="#"><img src="images/GIGAMAIL.png" alt="Vista Pro" /></a>
        <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse">
          <span class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span> </button>

        <div id="my-nav" class="collapse navbar-collapse">

          <div>
            <ul class="navbar-nav mx-auto logo-desktop">
              <li class="nav-item active">
                <a class="nav-link" href="#"><img src="images/GIGAMAIL.png" alt="Vista Pro" style="width: 25%" /></a>
              </li>
            </ul>
          </div>
          <ul class="navbar-nav float-right menu-links">
            <li class="nav-item">
              <a class="nav-link " href="#">Trang Chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.Event') }}">Sự Kiện</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('tickets.create') }}">Mua vé</a>
            </li>


            @auth
            @if(Auth::user()->UserType === 2)
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('profile.student') }}">{{ Auth::user()->name }}</a>
            </li>
            @elseif(Auth::user()->UserType === 3)
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('profile.external') }}">{{ Auth::user()->name }}</a>
            </li>
            @elseif(Auth::user()->UserType !== 1) <!-- Thêm điều kiện kiểm tra không phải là admin -->
            <li class="nav-item">
              <a class="nav-link active" href="#"><i class="icon fa fa-user"></i> {{ Auth::user()->name }}</a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
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
        <img class="d-block w-100 home-bg" alt="home-bg" src="images/event1.webp">
        <div class="carousel-caption d-md-block">
          <p class="frst-hrd">Everyone is Photogenic</p>
          <h5>Today’s SPECIAL MOMENTS.</h5>
          <p>Creating a timeless look, coupled with a flawless moment</p>

        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 home-bg" alt="home-bg" src="images/event1.webp">

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

  <div class="container-fluid fh5co-about-us" id="about-us">
    <div class="olw">
      <h1><b>GIGAMAIL ART LIGHTING EXPERIENCE VIET NAM</b></h1>
      <h5>Triển lãm nghệ thuật</h5>
    </div>
    <div class="ola">

      <p> Không gian triển lãm tranh Nghệ Thuật tại Gigamail Việt Nam được kết hợp từ không gian ứng dụng công nghệ tương tác được trình chiếu thông qua những ứng dụng công nghệ hàng đầu thế giới, kết hợp với không gian trang trí tái hiện lại những điểm “sống” mang đậm giá trị văn hóa, nghệ thuật</p>

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
    <div class="opw">
      <div class="opp">
        <a href="images/425755414_122133156428086141_4711176509214959497_n-20240206111428-soa1s.jpg" class="image-link">
          <img src="images/425755414_122133156428086141_4711176509214959497_n-20240206111428-soa1s.jpg">
        </a>
      </div>
      <div class="container">
        <div class="row">
          <div class="owl-carousel owl-carousel2 owl-theme">
            <div>
              <div class="card text-center"> <img class="card-img-top" src="images/picture30-20231114024913-egli3.jpg" alt="">
              </div>
            </div>

            <div>
              <div class="card text-center"> <img class="card-img-top" src="images/picture26-20231016095551-r7b91.jpg" alt="">

              </div>
            </div>

            <div>
              <div class="card text-center"> <img class="card-img-top" src="images/picture18-20231114024855-xzjkx.jpg" alt="">

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>



  </div>



  <div class="container-fluid fh5co-portfolio" id="portfolio">
    <div class="container">
      @php
      $latestExhibition = $exhibitions->sortByDesc('ExhibitionID')->first();
      @endphp
      <div class="ikm">
        <h1><b> SỰ KIỆN NGHỆ THUẬT </b></h1>
        <br>
        <p>"CHÀO MỪNG ĐẾN VỚI SỰ KIỆN NGHỆ THUẬT GIGIMAIL, NƠI MỖI MÙA XUÂN, HẠ, THU, ĐÔNG LÀ MỘT TÁC PHẨM ĐẦY CẢM XÚC VÀ SẮC MÀU."</p>
        <p><i>"Triển lãm diễn ra theo mùa"</i></p>
        @if ($latestExhibition)
      </div>
      <br>
      <!-- <p>{{ $latestExhibition->Description }}</p> -->
      <div class="ikn">
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
            <h3><b>Thời Gian Bình Chọn</b>
              <p>Thứ 2 - CN</p>
              <p></p>
            </h3>
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
        @else
        <div class="ikn">
          <div class="ikb">
            <div><img src="icon/icon-calendar-20231107042404-tnwba.png" alt="" srcset=""></div>
            <div>
              <h3><b>Ngày bắt đầu:<br>
                  <p></p>
                </b></h3>
            </div>
          </div>
          <div class="ikb">
            <div><img src="icon/icon-clock-20231107042421-rkntj.png" alt=""></div>
            <div>
              <h3><b>Thời Gian Bình Chọn</b>
                <p></p>
                <p></p>
              </h3>
            </div>
          </div>
          <div class="ikb">
            <div> <img src="icon/icon-time-20231107043518-b5rj6.png" alt="" srcset=""></div>
            <div>
              <h3><b>Ngày kết thúc:<br>
                  <p></p>
                </b></h3>
            </div>
          </div>
          <div class="ikb">
            <img src="icon/icon-location-20231107042453-b1kzc.png" alt="">
            <h3><b>Địa Đỉa Tổ Chức:<br>
                <p></p>
              </b></h3>
          </div>
          @endif
        </div>
        <div class="yui">
          <div class="uyt">

            <a href="#"><img src="images/triển lãm mùa hè.jpg" alt="" srcset="" width="100%"></a>
          </div>
          <div class="uyt">
            <a href="#"><img src="images/triển lãm mùa xuân.jpg" alt="" width="100%"></a>
          </div>
          <div class="uyt">
            <a href="#"><img src="images/triển lãm mùa thu.jpg" alt="" width="100%"></a>
          </div>
          <div class="uyt">
            <a href="#"><img src="images/Triển lãm mùa đông.jpg" alt="" width="100%"></a>
          </div>
        </div>
        <div class="ytr">
          <div class="container mt-3">

            <button type="button" class="btna" data-bs-toggle="modal" data-bs-target="#eventModal" id="hiddenButton" style="display:none;">
              <b>Đăng ký Tham Gia</b>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel" style="color: black;">Điều kiện và Giải Thưởng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="background-color: black;padding: 30px;text-align:justify">
                    <!-- Nội dung của bạn được đặt tại đây -->
                    <h2 style="color: rgb(255, 145, 77)"><b>Đối Tượng Tham Gia Sự kiện </b></h2>
                    <p style="color: white;padding: 10px;">-Bạn Là sinh viên của trường (sinh viên mọi năm đều có thể tham gia)</p>
                    <br>
                    <h2 style="color: rgb(255, 145, 77)"><b>Thể lệ Đăng ký</b></h2>
                    <p style="color: white;padding: 10px;">-Để tham gia sự kiện,sinh viên đăng nhập vào tài khoản cá nhân của trường để tham gia </p>
                    <p style="color: white;padding: 10px;">-Nếu có xẩy ra vấn đề hãy liên hệ <a href="#">tại đây</a> hoặc chat trực tiếp với quản lý </p>
                    <br>
                    <h2 style="color: rgb(255, 145, 77)"><b>Sự kiện có 2 vòng thi</b></h2>
                    <h5 style="color: rgb(255, 145, 77)"> Vòng 1</h5>
                    <p style="color: white;padding: 10px;">-Sinh viên khi gửi bài lên dự thi sẽ được hội đồng quản lý xét duyệt nếu tranh đủ điều kiện sẽ được thông qua</p>
                    <h5 style="color: rgb(255, 145, 77)"> Vòng 2</h5>
                    <p style="color: white;padding: 10px;">-Các bài được duyệt sẽ gửi lên 1 trang công khai để các mọi người lựa chọn (bao gồm sinh viên trong trường và cả bên ngoài)
                      bài dự thi nào được nhiều like nhất khi kết thúc cuộc thi sẽ là người chiến thắng
                    </p>
                    <br>
                    <h2 style="color: rgb(255, 145, 77);padding: 10px;"><b>Về việc sử dụng hình ảnh và tác phẩm dự thi</b></h2>
                    <p style="color: white;padding: 10px;">-Trường Đại học GIGAMAI được toàn quyền sử dụng hình ảnh của thí sinh và tất cả các tác phẩm dự thi trước, trong và sau cuộc thi cho mục đích truyền thông và các hoạt động khác của nhà trường mà không phải trả bất cứ chi phí nào liên quan.</p>
                    <br>
                    <h2 style="color: rgb(255, 145, 77)"><b>Cơ cấu giải thưởng</b></h2>
                    <p style="color: white;padding: 10px;"><img src="images/—Pngtree—gold 1st place medal vector_5205674.png" alt="" srcset="" width="20%">Giải Nhất (1 giải)</i></p>
                    <p style="color: white;padding: 10px;">30.000.000 đồng và học bổng 70% học phí 4 năm đại học (trị giá khoảng 166,9 - 444,4 triệu đồng/suất)</p>
                    <p style="color: white;padding: 10px;"><img src="images/—Pngtree—silver 2st place medal vector_5205675 copy.png" alt="" srcset="" width="20%><i class=" fa-solid fa-circle">Giải Nhì (1 giải)</i></p>
                    <p style="color: white;padding: 10px;">20.000.000 đồng và học bổng 100% học phí năm 1 (trị giá khoảng 46,4 - 162,6 triệu đồng/suất)</p>
                    <p style="color: white;padding: 10px;"><img src="images/giainhat_black_background.png" alt="" srcset="" width="20%><i class=" fa-solid fa-circle">Giải khuyến khích (3 giải)</i></p>
                    <p style="color: white;padding: 10px;">Mỗi giải 5.000.000 đồng/giải và học bổng 30% học phí năm 1 (trị giá khoảng 13,9 - 48,8 triệu đồng/suất)</p>
                    <br>
                    <p style="color: rgb(255, 145, 77);padding: 10px;">*Lưu ý:</p>
                    <p style="color: rgb(255, 145, 77);padding: 10px;">-Tham gia sự kiện đúng giờ và ngày ghi trên page</p>

                    <p style="color: rgb(255, 145, 77);padding: 10px;">-Bài của sinh viên khi gửi bài lên sẽ được xem xét qua có thể bị từ chối</p>
                    <p style="color: rgb(255, 145, 77);padding: 10px;">-Phần thưởng sẽ trao cho người thắng cuộc sau 12 tiếng khi kết thúc cuộc thi</p>
                    <p style="color: rgb(255, 145, 77);padding: 10px;">-Thí sinh có thể huỷ bài dự thi trước hoặc sau khi bài được đưa lên tham gia mà không cần qua người quản lý</p>
                    <br>
                    <form id="event-form" action="{{ route('join.event') }}" method="POST">
                      @csrf
                      <label>
                        <input type="checkbox" name="agree" id="agree">
                        Tôi đã đọc và chấp hành đúng nội quy
                      </label>
                      <button type="submits"><b>Tham gia</b></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="prize" style="display: none;">
            <div class="prizea">
              <div class="prizeb">
                <div class="hovercard-container">
                  <img src="images/triển lãm mùa hè.jpg" alt="Triển lãm mùa hè" class="imgah" width="100%">
                  <div class="hovercard">
                    <h3>Triển lãm mùa hè</h3>
                    <p>Thông tin chi tiết về triển lãm mùa hè. Những tác phẩm nghệ thuật độc đáo sẽ được trưng bày tại sự kiện.</p>
                    <p>Tác giả: Nguyễn Văn A</p>
                    <p>Điểm bình chọn:</p>
                    <p>Ngày Đăng Bài:</p>
                    <p>Thể loại: Hội họa</p>
                    <p>Lượt xem:</p>
                  </div>
                </div>
                <div class="mvvc">
                  <img src="images/giai1.png" alt="Giải 2" width="30%">
                </div>
                <i>"Mùa hè mang đến hơi thở của nghệ thuật, khi những bông hoa rực rỡ như bảng màu của thiên nhiên và ánh nắng chan hòa như nét vẽ của một bậc thầy tài hoa."</i>
              </div>
            </div>
            <div class="prizea">
              <div class="prizeb">
                <div class="hovercard-container">
                  <img src="images/triển lãm mùa hè.jpg" alt="Triển lãm mùa hè" class="imgah" width="100%">
                  <div class="hovercard">
                    <h3>Triển lãm mùa hè</h3>
                    <p>Thông tin chi tiết về triển lãm mùa hè. Những tác phẩm nghệ thuật độc đáo sẽ được trưng bày tại sự kiện.</p>
                    <p>Tác giả: Nguyễn Văn A</p>
                    <p>Điểm bình chọn:</p>
                    <p>Ngày Đăng Bài:</p>
                    <p>Thể loại: Hội họa</p>
                    <p>Lượt xem:</p>
                  </div>
                </div>
                <div class="mvvc">
                  <img src="images/gai2.png" alt="Giải 2" width="30%">
                </div>
                <i>"Mùa hè mang đến hơi thở của nghệ thuật, khi những bông hoa rực rỡ như bảng màu của thiên nhiên và ánh nắng chan hòa như nét vẽ của một bậc thầy tài hoa."</i>
              </div>
            </div>
            <div class="prizea">
              <div class="prizeb">
                <div class="hovercard-container">
                  <img src="images/triển lãm mùa hè.jpg" alt="Triển lãm mùa hè" class="imgah" width="100%">
                  <div class="hovercard">
                    <h3>Triển lãm mùa hè</h3>
                    <p>Thông tin chi tiết về triển lãm mùa hè. Những tác phẩm nghệ thuật độc đáo sẽ được trưng bày tại sự kiện.</p>
                    <p>Tác giả: Nguyễn Văn A</p>
                    <p>Điểm bình chọn:</p>
                    <p>Ngày Đăng Bài:</p>

                  </div>
                </div>
                <div class="mvvc">
                  <img src="images/giainhat_black_background.png" alt="Giải 2" width="30%">
                </div>
                <i>"Mùa hè mang đến hơi thở của nghệ thuật, khi những bông hoa rực rỡ như bảng màu của thiên nhiên và ánh nắng chan hòa như nét vẽ của một bậc thầy tài hoa."</i>
              </div>
            </div>

          </div>
          <div class="containers mt-5s">
            @if($event)
            <div class="ikm">
              <h1 style="text-transform: uppercase;"><b>{{ $event->Title }}</>
              </h1>
              <hr>
              <p style="padding: 10px;"><i>Tình trạng: {{ $isOngoing ? 'Đang diễn ra' : 'Kết thúc' }}</i></p>
              @if(!$isOngoing)
              <p style="padding: 10px;"><i>Kết thúc vào: {{ $event->EndDate->format('d/m/Y H:i') }}</i></p>

              @if($entries->isEmpty())
              <p>Không có bức tranh nào đạt giải.</p>
              @else
            </div>

            <div class="prize">
              @foreach($entries as $index => $entry)
              @if($index == 0)
              <div class="prizea">
                <div class="prizeb">
                  <div class="hovercard-container">
                    <img src="{{ asset($entry->image_path) }}" alt="Giải nhất" class="imgah" width="100%">
                    <div class="hovercard">
                      <h3>{{ $entry->name }}</h3>
                      <p>{{ $entry->description }}</p>
                      <p>Tác giả: {{ $entry->user->name }}</p>
                      <p>Điểm bình chọn: {{ $entry->likes_count }}</p>
                      <p>Ngày Đăng Bài: {{ $entry->created_at->format('d/m/Y') }}</p>

                    </div>
                  </div>
                  <div class="mvvc">
                    <img src="images/giai1.png" alt="Giải 1" width="30%">
                  </div>
                  <i>"Mùa xuân đến mang theo những tia nắng ấm áp, thổi bừng lên sắc hoa và hy vọng mới cho cuộc sống."</i>
                </div>
              </div>
              @elseif($index == 1)
              <div class="prizea">
                <div class="prizeb">
                  <div class="hovercard-container">
                    <img src="{{ asset($entry->image_path) }}" alt="Giải nhất" class="imgah" width="100%">
                    <div class="hovercard">
                      <h3>{{ $entry->name }}</h3>
                      <p>{{ $entry->description }}</p>
                      <p>Tác giả: {{ $entry->user->name }}</p>
                      <p>Điểm bình chọn: {{ $entry->likes_count }}</p>
                      <p>Ngày Đăng Bài: {{ $entry->created_at->format('d/m/Y') }}</p>

                    </div>
                  </div>
                  <div class="mvvc">
                    <img src="images/gai2.png" alt="Giải 1" width="30%">
                  </div>
                  <i>"Xuân về là lúc thiên nhiên như bừng tỉnh sau giấc ngủ đông dài, mang đến sự tươi mới và tràn đầy sức sống."</i>
                </div>
              </div>
              @elseif($index == 2)
              <div class="prizea">
                <div class="prizeb">
                  <div class="hovercard-container">
                    <img src="{{ asset($entry->image_path) }}" alt="Giải nhất" class="imgah" width="100%">
                    <div class="hovercard">
                      <h3>{{ $entry->name }}</h3>
                      <p>{{ $entry->description }}</p>
                      <p>Tác giả: {{ $entry->user->name }}</p>
                      <p>Điểm bình chọn: {{ $entry->likes_count }}</p>
                      <p>Ngày Đăng Bài: {{ $entry->created_at->format('d/m/Y') }}</p>

                    </div>
                  </div>
                  <div class="mvvc">
                    <img src="images/giainhat_black_background.png" alt="Giải 1" width="30%">
                  </div>
                  <i>"Mùa xuân là bức tranh tuyệt đẹp của thiên nhiên, nơi mọi thứ đều trở nên rực rỡ và đầy màu sắc, là thời khắc để ta bắt đầu những điều mới mẻ."</i>
                </div>
              </div>

            </div>


            @endif
            @endforeach
            @endif
            @endif
            @else

            @endif
          </div>





          <div class="tree">
            <h1>
              <b>WELCOME TO</b>
              <br>
              <h1><b>
                  GIGAMAIL ART LIGHTING EXPERIENCE VIETNAM
                </b></h1>
            </h1>
            <br>
            <p style="color: white;">
              CHÀO MỪNG BẠN ĐẾN VỚI TRIỂN LÃM ĐA GIÁC QUAN TẠI GIGAMAIL VIỆT NAM
            </p>

            <div class="trf">
              <img src="images/sitemap-240cmx160cmh-1108_fa-20231113100557-927ps.png" alt="" srcset="" width="100%">
            </div>
            <br>
            <div class="tgh">
              <div class="trs">
                <div>
                  <h2><b>INTERACTIVE ENTRANCE</b></h2>
                  <p>Xuyên qua bức tường hiện tại,
                    Từ hành lang tương tác, du khách bước qua làn khói sương mờ, bóng gương ảo ảnh, đưa chúng ta vào thế giới nghệ thuật</p>
                </div>
                <br>
                <div>
                  <a href="images/shisheido-designboom-7-20231016070224-qha-e.jpg" class="image-link">
                    <img src="images/shisheido-designboom-7-20231016070224-qha-e.jpg" width="100%">
                  </a>
                </div>
              </div>
              <hr>
              <div class="trs">
                <div>
                  <h2><b>VÙNG ĐẤT CỦA VINCENT</b></h2>
                  <p>Lắng đọng theo từng cung bậc cảm xúc với câu chuyện cuộc đời, lý tưởng về con đường nghệ thuật đầy dấu ấn</p>
                </div>
                <br>
                <div>
                  <a href="images/412619201_122124784946086141_125458319236205293_n-20240224035046-kpey7.jpg" class="image-link">
                    <img src="images/412619201_122124784946086141_125458319236205293_n-20240224035046-kpey7.jpg" width="100%">
                  </a>
                </div>
                <div>
                  <br>
                  <a href="images/picture8-20231114024843-bpum-.jpg" class="image-link">
                    <img src="images/picture8-20231114024843-bpum-.jpg" width="100%">
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div style="text-align: center;">
            <img src="images/image-from-rawpixel-id-9058604-png-20231107045041-pe6an.png" alt="" srcset="" width="15%">
            <br>
            <p style="color: white;">Không gian trưng bày hơn 150 tác phẩm tiêu biểu</p>
          </div>
          <br>
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/20231208_184330jpg-20240224041813-xzj28.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/20231208_184330jpg-20240224041813-xzj28.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/20231208_184330jpg-20240224041813-xzj28.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <br>
        <div style="text-align: center;color: rgb(255, 145, 77);">
          <img src="images/image-from-rawpixel-id-9058604-png-20231107045041-pe6an.png" alt="" srcset="" width="15%">
          <h2>GIGAMAIL</h2>

          <p style="color: white;">Không chỉ được thưởng lãm hơn 300 kiệt tác nổi bật , du khách còn chạm đến hành trình trải nghiệm không gian nghệ thuật sống động được kiến tạo bởi công nghệ hiện đại</p>
          <br>
          <div class="qaz">
            <img src="images/picture26-20231016095551-r7b91.jpg" alt="" srcset="" width="60%" class="imageslink">
          </div>
        </div>
        <div style="text-align: center;color: rgb(255, 145, 77);">
          <img src="images/image-from-rawpixel-id-9058604-png-20231107045041-pe6an.png" alt="" srcset="" width="15%">
          <h2>GIGAMAIL</h2>

          <p style="color: white;">Giao thoa giữa vẻ đẹp cổ điển, kết hợp công nghệ tương tác đỉnh cao tạo nên kiệt tác nghệ thuật đa giác quan hoàn mỹ. Mỗi du khách khi đặt chân đến GIGIMAIL là chạm đến tâm hồn nghệ thuật chân phương để tận hưởng những “giây phút bình yên”</p>
          <br>
          <div class="qaz">
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/Ub7cW3TI19Y?rel=0&modestbranding=0&playsinline=1&controls=0&enablejsapi=1&origin=https://www.vangoghexpo.vn&autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allow="autoplay" allowfullscreen></iframe>
          </div>
        </div>

      </div>


    </div>

  </div>
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
    document.getElementById('event-form').addEventListener('submit', function(event) {
      var checkbox = document.getElementById('agree');
      if (!checkbox.checked) {
        event.preventDefault(); // Ngăn chặn form gửi đi
        alert('Bạn phải đồng ý với nội quy trước khi tham gia sự kiện.');
      }
    });
    document.querySelectorAll('.uyt a').forEach(function(element) {
      element.addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn không cho thẻ <a> chuyển hướng
        document.getElementById('hiddenButton').click(); // Kích hoạt nút ẩn để mở modal
      });
    });
  </script>

  </div>
  <div class="container-fluid fh5co-news" id="news">

  </div>
  <div class="map" style="text-align: center;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14896.020198718406!2d105.83193456586285!3d21.032483951117754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab006f73ca01%3A0x34c0116b8812c24a!2sI-Museum!5e0!3m2!1sen!2s!4v1718619044945!5m2!1sen!2s" width="600" height="450" style="border:0;border-radius: 27px;WIDTH: 75%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            <span class="email"><img src="images/email.png" alt="email icon" /></span><b style="color: white;">contact@example.com</b>
          </p>
          <p>
            <span class="phone"><img src="images/phone.png" alt="phone icon" /></span><b style="color: white">+123-456-7890</b>
          </p>
          <h3 style="color: white">We Are Social:</h3>
          <ul class="navbar-nav float-left social-links footer-social">
            <li class="nav-item">
              <a class="nav-link" href="https://www.facebook.com/fh5co"><i style="color: white" class="fab fa-facebook-f"></i></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#"><i style="color: white" class="fab fa-pinterest-p"></i></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="https://twitter.com/fh5co"><i style="color: white" class="fab fa-twitter"></i></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#"><i style="color: white" class="fab fa-google-plus-g"></i></a>
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

</body>

</html>