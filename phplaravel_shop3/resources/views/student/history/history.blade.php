<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
}
    .table {
    width: 600px; 
    margin: 0 auto;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.table th, .table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    transition: background-color 0.3s ease;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.table tbody tr:nth-child(even) {
    background-color: #f8f8f8;
}

.table tbody tr:hover {
    background-color: #e2e2e2;
    cursor: pointer;
    transform: translateY(-2px);
    transition: background-color 0.3s ease, transform 0.3s ease;
}
.container h1{
     
    color: #fff; 
    padding: 20px; /* Khoảng cách giữa chữ và khung */
    font-family: 'Arial', sans-serif; /* Font chữ */
    font-size: 36px; /* Kích thước font */
    text-align: center; /* Canh lề giữa */
    border-radius: 10px; /* Bo tròn viền */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng */
}
</style>
<div class="container">
    <h1>Lịch Sử Tạo Sản Phẩm</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Mô Tả</th>
                <th>Giá</th>
                <th>Ngày Tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at->toFormattedDateString() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
