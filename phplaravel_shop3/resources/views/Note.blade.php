<!DOCTYPE html>
<html>
<head>
    <title>Note</title>
    <!-- Thêm các liên kết tới CSS của bạn ở đây -->
</head>
<body>
    <!-- Kiểm tra thông báo thành công -->
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
            window.location.href = "{{ url('/student/sukien') }}"; // Thay đổi '/desired-url' thành URL bạn muốn chuyển đến
        </script>
    @endif

    <!-- Kiểm tra thông báo lỗi -->
    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
            window.location.href = "{{ url('/student/sukien') }}"; // Thay đổi '/desired-url' thành URL bạn muốn chuyển đến
        </script>
    @endif
    

    <!-- Nội dung trang web của bạn ở đây -->
</body>
</html>
