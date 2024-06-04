<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Form login unitop.vn</title>
</head>

<body>
    <style>
        /*reset.css*/
        
    </style>
    <div id="wrapper">
    <form action="/admin/login/store" method="POST" id="form-login">
    @csrf
    <h1 class="form-heading">Login for Admin</h1>
    <div class="form-group">
        <i class="far fa-user"></i>
        <input type="email" name="email" class="form-input" placeholder="Email">
    </div>
    <div class="form-group">
        <i class="fas fa-key"></i>
        <input type="password" name="password" class="form-input" placeholder="Password">
    </div>
    <input type="submit" value="Đăng nhập" class="form-submit">
</form>

    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
</html>