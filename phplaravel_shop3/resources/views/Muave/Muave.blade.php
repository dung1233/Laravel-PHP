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
    <title>Photogenic - Free Portfolio Bootstrap Template</title>
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
                            <a class="nav-link" href="#contact">Mua vé</a>
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
    <div class="container mt-5">

        <div class="ticket-form">
            <div class="sdfd">
                <h2 class="text-center"><b>CHỌN NGÀY & GIỜ TRIỂN LÃM</b></h2>
            </div>

            <form id="ticket-form" action="{{ route('tickets.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label><b>Ngày triển lãm:</b></label>
                    <div id="date-slots">
                        <!-- Thêm ngày triển lãm ở đây -->
                    </div>
                    <input type="hidden" name="date" id="selected-date">
                </div>
                <div class="form-group">
                    <label><b>Khung giờ triển lãm:</b></label>
                    <div id="time-slots">
                        <!-- Thêm khung giờ triển lãm ở đây -->
                    </div>
                    <input type="hidden" name="time" id="selected-time">
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng:</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-secondary" id="quantity-minus">-</button>
                        </span>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-secondary" id="quantity-plus">+</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ticket_type">Loại vé:</label>
                    <select name="ticket_type" id="ticket_type" class="form-control">
                        @foreach($prices as $price)
                        <option value="{{ $price->id }}" data-price="{{ $price->price }}">{{ $price->ticket_type }} - {{ number_format($price->price, 0, ',', '.') }} VNĐ</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá vé:</label>
                    <p id="ticket-price" class="price" style="color: black;"></p>
                </div>
                <div class="form-group">
                    <label for="total-price">Tổng giá:</label>
                    <p id="total-price" class="price" style="color: black;"></p>
                </div>
                <div class="cccf">
                    <div class="sdfg">
                        <button type="submita" name="action" value="add-to-cart" class="btn btn-primary btn-block">THÊM VÀO GIỎ</button>
                    </div>
                    <div class="sdfg">
                        <button type="submita" name="action" value="buy-now" class="btn btn-secondary btn-block">MUA NGAY</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="mnb">
            <img src="/images/event1.webp" alt="" srcset="" width="100%">
            <h2 style="color: yellow;">TICKET</h2>
            <p>Thông tin vé:</p>
            <br>
            <p>- 01 Lượt tham quan, trải nghiệm không gian triển lãm trong 120 phút</p>
            <br>
            <p>Đối tượng áp dụng:</p>
            <br>

            <p>- Khách hàng dưới 22 tuổi và có thẻ học sinh, sinh viên</p>
            <p>- Khách hàng trên 65 tuổi và có CCCD kèm theo</p>
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
            // Chọn ngày triển lãm
            const dates = [

                '2024-06-11',
                '2024-06-12', '2024-06-13', '2024-06-14',
                '2024-06-15', '2024-06-16', '2024-06-17', '2024-06-18', '2024-06-19'
            ];
            const dateSlots = $('#date-slots');
            dates.forEach(date => {
                const button = $('<button>', {
                    type: 'button',
                    class: 'btn btn-outline-primary',
                    text: date,
                    click: function() {
                        $('#selected-date').val(date);
                        dateSlots.find('button').removeClass('btn-primary').addClass('btn-outline-primary');
                        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
                    }
                });
                dateSlots.append(button);
            });

            // Chọn khung giờ triển lãm
            const times = [
                '10:00-12:00', '12:00-14:00', '14:00-16:00',
                '16:00-18:00', '18:00-20:00', '20:00-22:00'
            ];
            const timeSlots = $('#time-slots');
            times.forEach(time => {
                const button = $('<button>', {
                    type: 'button',
                    class: 'btn btn-outline-primary',
                    text: time,
                    click: function() {
                        $('#selected-time').val(time);
                        timeSlots.find('button').removeClass('btn-primary').addClass('btn-outline-primary');
                        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
                    }
                });
                timeSlots.append(button);
            });

            // Hàm cập nhật giá vé và tổng giá
            function updatePrice() {
                const quantity = parseInt($('#quantity').val());
                const selectedOption = $('#ticket_type').find('option:selected');
                const price = parseFloat(selectedOption.data('price'));
                const totalPrice = quantity * price;

                $('#ticket-price').text(price.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));
                $('#total-price').text(totalPrice.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));
            }

            // Cập nhật giá vé khi chọn loại vé
            $('#ticket_type').change(function() {
                updatePrice();
            }).trigger('change');

            // Tăng/giảm số lượng vé
            $('#quantity-minus').click(function() {
                let quantity = parseInt($('#quantity').val());
                if (quantity > 1) {
                    $('#quantity').val(quantity - 1);
                    updatePrice();
                }
            });

            $('#quantity-plus').click(function() {
                let quantity = parseInt($('#quantity').val());
                $('#quantity').val(quantity + 1);
                updatePrice();
            });

            $('#quantity').on('input', function() {
                updatePrice();
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