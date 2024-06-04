<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $primaryKey = 'TypeID';  // Đặt khóa chính là 'TypeID'
    public $incrementing = false;  // Nếu 'TypeID' không phải là tự tăng

    // Lấy tất cả Users thuộc về UserType này
    public function users()
    {
        return $this->hasMany(User::class, 'UserType', 'TypeID');
    }
}

