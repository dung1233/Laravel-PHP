<style>
    /* Định dạng cho form */
    form {
        max-width: 500px;
        margin: 0 auto;
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    /* Định dạng cho nhãn */
    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    /* Định dạng cho input và textarea */
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 15px;
        font-size: 16px;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* Định dạng cho nút submit */
    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
<a href="{{ route('profile.student') }}" class="btn btn-primary">Quay trở về</a>
<form action="/student/store" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" placeholder="Nhập tên sản phẩm...">
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" placeholder="Nhập mô tả sản phẩm..."></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="text" id="price" name="price" placeholder="Nhập giá sản phẩm...">
    </div>
    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image">
    </div>
    <label for="product_type">Loại Sản Phẩm</label>
    <select id="product_type" name="product_type" required>
        <option value="">Chọn loại sản phẩm</option>
        <option value="electronics">Điện tử</option>
        <option value="clothing">Quần áo</option>
        <option value="food">Thực phẩm</option>
        
    </select>
    <button type="submit">Tạo sản phẩm</button>
</form>
