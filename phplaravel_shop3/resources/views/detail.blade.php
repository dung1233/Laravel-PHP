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
                            <a class="nav-link" href="#about-us">Giới Thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.Event') }}">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Mua vé</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#news">News</a>
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

    </div>

    <div class="lsss">
        <div class="container">
            <div class="row artwork-card">
                <div class="col-md-4 artist-info">
                    <h3>Tên Tranh
                        <br>
                        {{ $entry->name }}
                    </h3>
                    <p>
                        {{ $entry->user->name }}
                    </p>
                    <p> {{ $entry->user->PhoneNumber }}</p>
                    <p>{{ $entry->user->email }}</p>
                    <p>{{ $entry->user->StudentCode }}</p>
                    <br>
                    <div>
                        <a href="#" class="like-button" data-id="{{ $entry->id }}" data-liked="{{ $entry->likes->where('user_id', Auth::id())->count() > 0 ? 'true' : 'false' }}">
                            <span class="img-icon"><img src="{{ asset('images/heart.png') }}" class="{{ $entry->likes->where('user_id', Auth::id())->count() > 0 ? 'liked' : '' }}" alt="heart icon" /></span>
                            <span class="txt">{{ $entry->likes->count() }} Likes</span>
                        </a>
                    </div>

                </div>
                <div class="col-md-8 artwork-image">

                    <img src="{{ asset($entry->image_path) }}" alt="{{ $entry->name }}">
                </div>
            </div>
            <div class="row artwork-card comments">
                <div class="col-md-12">
                    <h4>Bình luận của người xem</h4>
                    <form action="{{ route('entries.comment', $entry->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Thêm bình luận:</label>
                            <textarea id="comment" name="comment" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submitss" class="btn btn-primary">Gửi bình luận</button>
                    </form>
                    <hr>
                    @foreach($entry->comments as $comment)
                    <div class="comment mb-3">
                        <p><strong>{{ $comment->user->name }}</strong> {{ $comment->created_at->format('d/m/Y H:i') }}</p>
                        <p>{{ $comment->comment }}</p>
                    </div>
                    <hr>
                    @endforeach

                </div>

            </div>
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
                        <span class="email"><img src="images/email.png" alt="email icon" /></span><b style="color: white;">contact@example.com</b>
                    </p>
                    <p>
                        <span class="phone"><img src="images/phone.png" alt="phone icon" /></span><b style="color: white;">+123-456-7890</b>
                    </p>
                    <h3 style="color: white;">We Are Social:</h3>
                    <ul class="navbar-nav float-left social-links footer-social">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/fh5co"><i style="color: white;" class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i style="color: white;" class="fab fa-pinterest-p"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="https://twitter.com/fh5co"><i style="color: white;" class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i style="color: white;" class="fab fa-google-plus-g"></i></a>
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
    <div class="container-fluid copy">
        <div class="col-lg-12">
            <p>&copy; 2018 Photogenic. All rights Reserved. Design by <a href="https://freehtml5.co" target="_blank">FreeHTML5.co</a>.</p>
        </div>
    </div>
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