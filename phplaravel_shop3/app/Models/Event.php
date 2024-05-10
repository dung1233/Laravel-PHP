<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Chỉ định tên bảng nếu nó không theo quy tắc đặt tên mặc định của Laravel
    protected $table = 'exhibitions';

    // Chỉ định khóa chính nếu nó không phải là 'id'
    protected $primaryKey = 'ExhibitionID';

    // Tắt tính năng tự động quản lý timestamps nếu bảng không có các cột 'created_at' và 'updated_at'
    public $timestamps = false;

    // Định nghĩa các trường có thể được mass assignable (an toàn khi gán hàng loạt từ mảng dữ liệu)
    protected $fillable = [
        'Title',
        'Description',
        'StartDate',
        'EndDate',
        'Location'
    ];
    protected $casts = [
        'StartDate' => 'datetime',
        'EndDate' => 'datetime',
    ];
}
