<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .checkout-container {
        width: 80%;
        margin: 50px auto;
        background-color: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .checkout-header h1 {
        text-align: left;
    }

    .checkout-header nav {
        margin: 10px 0;
    }

    .checkout-header nav a {
        color: #000;
        text-decoration: none;
    }

    .checkout-content {
        display: flex;
        justify-content: space-between;
    }

    .billing-info,
    .order-summary {
        width: 45%;
    }

    .billing-info h2,
    .order-summary h2 {
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .billing-info form {
        margin-top: 20px;
    }

    .billing-info form label {
        display: block;
        margin: 10px 0 5px;
    }

    .billing-info form input,
    .billing-info form select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .form-group {
        display: flex;
        justify-content: space-between;
    }

    .form-item {
        width: 48%;
    }

    .billing-info button {
        width: 100%;
        padding: 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .billing-info button:hover {
        background-color: #0056b3;
    }

    .order-summary .item {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .order-summary .item img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    .order-summary .item-info {
        flex-grow: 1;
    }

    .order-summary .price {
        white-space: nowrap;
    }

    .discount-code {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }

    .discount-code input {
        width: 70%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .discount-code button {
        padding: 10px 20px;
        border: 1px solid #ddd;
        background-color: #eee;
        cursor: pointer;
    }

    .discount-code button:hover {
        background-color: #ddd;
    }

    .summary,
    .total {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-top: 1px solid #ddd;
    }

    .total {
        font-weight: bold;
        font-size: 18px;
    }

    footer {
        text-align: center;
        margin-top: 20px;
        color: #777;
    }

    .order-summary {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .order-summary h2 {
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }

    .list-group-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        border-radius: 5px;
        background-color: #fff;
    }

    .img-thumbnail {
        border-radius: 5px;
        margin-right: 20px;
    }

    .btn-danger {
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 5px;
    }

    .total-price {
        font-weight: bold;
        font-size: 16px;
        color: #ff5722;
    }

    @media (max-width: 768px) {
        .list-group-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .img-thumbnail {
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-danger {
            width: 100%;
            text-align: center;
        }
    }
</style>

<body>
    <div class="checkout-container">
        <div class="checkout-header">
            <h1>JP-EXPO Viet Nam</h1>
            <nav>
                <a href="#">Giỏ hàng</a> &gt;
                <a href="#">Thông tin thanh toán</a> &gt;
                <span>Phương thức thanh toán</span>
            </nav>
        </div>

        <div class="checkout-content">
            <div class="billing-info">
                <h2>Thông tin thanh toán</h2>

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" required>

                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" required>

                    <div class="form-group">
                        <div class="form-item">
                            <label for="city">Tỉnh / thành</label>
                            <select id="city" name="city" class="form-control" required>
                                <option value="">Chọn tỉnh / thành</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="district">Quận / huyện</label>
                            <select id="district" name="district" class="form-control" required>
                                <option value="">Chọn quận / huyện</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit">Tiếp tục đến phương thức thanh toán</button>
                </form>
            </div>

            <div class="order-summary">
                <h2>Giỏ hàng</h2>
                <ul class="list-group mb-3">
                    @forelse ($cart as $index => $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="/images/event1.webp" alt="Loại vé" class="img-thumbnail" style="width: 15%;">
                            <div class="ms-3">
                                <h6 class="my-0">Loại Vé: {{ $item['name'] }}</h6>
                                <small class="text-muted">{{ number_format($item['total_price'], 0, ',', '.') }} VNĐ x {{ $item['quantity'] }}</small>
                                <p class="text-muted">Ngày triển lãm: {{ $item['date'] }}</p>
                                <p class="text-muted">Khung giờ: {{ $item['time'] }}</p>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('tickets.cart.remove', $index) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item">Giỏ hàng trống</li>
                    @endforelse
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng thành tiền</span>
                        <strong class="total-price">
                            {{ number_format($total, 0, ',', '.') }} VNĐ
                        </strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng thành tiền (USD)</span>
                        <strong class="total-price">
                            ${{ number_format($totalUSD, 2, '.', ',') }}
                        </strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Dữ liệu các tỉnh và quận/huyện
            var data = {
                "Hà Nội": ["Ba Đình", "Hoàn Kiếm", "Tây Hồ", "Long Biên", "Cầu Giấy", "Đống Đa", "Hai Bà Trưng", "Hoàng Mai", "Thanh Xuân"],
                "TP Hồ Chí Minh": ["Quận 1", "Quận 2", "Quận 3", "Quận 4", "Quận 5", "Quận 6", "Quận 7", "Quận 8", "Quận 9", "Quận 10"],
                "Đà Nẵng": ["Hải Châu", "Thanh Khê", "Sơn Trà", "Ngũ Hành Sơn", "Liên Chiểu", "Cẩm Lệ"]
            };

            // Đổ dữ liệu vào dropdown Tỉnh/Thành
            for (var city in data) {
                $('#city').append('<option value="' + city + '">' + city + '</option>');
            }

            // Cập nhật dropdown Quận/Huyện khi thay đổi Tỉnh/Thành
            $('#city').change(function() {
                var city = $(this).val();
                var districts = data[city];

                $('#district').empty().append('<option value="">Chọn quận / huyện</option>');
                if (districts) {
                    for (var i = 0; i < districts.length; i++) {
                        $('#district').append('<option value="' + districts[i] + '">' + districts[i] + '</option>');
                    }
                }
            });
        });
    </script>
</body>


</html>