<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Dancing+Script:wght@400;500&display=swap');

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #000000, #434343);
            font-family: 'Roboto', sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        .success-box {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            box-sizing: border-box;
            animation: scaleUp 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleUp {
            from { transform: scale(0.8); }
            to { transform: scale(1); }
        }

        .checkmark-circle {
            position: relative;
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: #4BB543;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .checkmark-circle .background {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #1ed711;
            border-radius: 50%;
            animation: circleExpand 0.5s ease-in-out;
        }

        .checkmark-circle .checkmark {
            position: relative;
            width: 40px;
            height: 20px;
            border-left: 5px solid #fff;
            border-bottom: 5px solid #fff;
            transform: rotate(-45deg);
            animation: checkmarkDraw 0.5s 0.5s ease-in-out forwards;
            opacity: 0;
        }

        @keyframes circleExpand {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }

        @keyframes checkmarkDraw {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 36px;
            margin: 0 0 20px;
        }

        p {
            font-size: 18px;
            margin: 0 0 20px;
        }

        a.button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #00ba2b; 
            color: #ffffff; 
            border-radius: 8px;
            text-decoration: none;
            font-size: 18px;
            font-weight: 700;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        a.button:hover {
            background-color: #cc8400;
            transform: translateY(-2px);
        }

        a.button:active {
            transform: translateY(0);
        }

    </style>
    <div class="container">
        <div class="success-box">
            <div class="checkmark-circle">
                <div class="background"></div>
                <div class="checkmark"></div>
            </div>
            <h1>Đã thanh toán thành công!</h1>
            <p>Cảm ơn bạn đã mua hàng. Đơn hàng của bạn sẽ được vận chuyển hãy để ý điện thoại nhé.</p>
            <a href="/" class="button">Tiếp tục mua sắm</a>
        </div>
    </div>
</body>
</html>