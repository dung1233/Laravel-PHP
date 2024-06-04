<style>
 body {
    font-family: 'Open Sans', Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    width: 80%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.container h1 {
    color: #333;
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
}

.table {
    width: 100%;
    margin: 20px 0;
    border-collapse: collapse;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.table th, .table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f9f9f9;
    font-weight: 600;
    color: #333;
}

.table tbody tr:nth-child(even) {
    background-color: #fafafa;
}

.table tbody tr:hover {
    background-color: #e9e9e9;
    cursor: pointer;
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
