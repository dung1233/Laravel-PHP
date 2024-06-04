<style>
    form {
        width: 400px;
        /* Điều chỉnh kích thước form theo ý muốn */
        margin: 0 auto;
        /* Căn giữa form */
        padding: 20px;
        border-radius: 8px;
        /* Bo tròn các góc của form */
        background-color: #f9f9f9;
        /* Màu nền của form */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Hiệu ứng box shadow */
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    textarea,
    button {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4CAF50;
        /* Màu nút */
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
        /* Màu nút khi hover */
    }
</style>


<form method="POST" action="{{ route('event.update', $entry->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên Sản Phẩm:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $entry->name }}">
            </div>
            <div class="form-group">
                <label for="description">Mô Tả:</label>
                <textarea id="description" name="description" class="form-control">{{ $entry->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Hình Ảnh:</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>