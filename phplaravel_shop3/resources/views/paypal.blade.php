<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        width: 20%;
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
                <form id="payment-form" action="{{ route('paypala') }}" method="post">
                    @csrf
                    @foreach ($cart as $index => $item)
                    <input type="hidden" name="items[{{ $index }}][name]" value="{{ $item['name'] }}">
                    <input type="hidden" name="items[{{ $index }}][price]" value="{{ $item['total_price'] }}">
                    <input type="hidden" name="items[{{ $index }}][quantity]" value="{{ $item['quantity'] }}">
                    @endforeach
                    <label for="payment-method">Phương thức thanh toán:</label>
                    <select name="payment_method" id="payment-method">
                        <option value="#">None</option>
                        <option value="paypal">PayPal</option>
                        <option value="credit-card">Credit Card</option>
                        <!-- Thêm các phương thức thanh toán khác nếu có -->
                    </select>
                    <div id="paypal-form" style="display: none;">
                        <label for="total">Tổng tiền:</label>
                        <input type="text" name="total" id="total" value="{{ number_format($totalUSD, 2, '.', ',') }}" readonly>
                        <button type="submit">Pay with PayPal</button>
                    </div>
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

    <script>
        document.getElementById('payment-method').addEventListener('change', function () {
            var paypalForm = document.getElementById('paypal-form');
            if (this.value === 'paypal') {
                paypalForm.style.display = 'block';
            } else {
                paypalForm.style.display = 'none';
            }
        });
    </script>
</body>

</html>
