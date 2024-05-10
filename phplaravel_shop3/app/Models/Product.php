<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id'; // Tên của khóa chính
    protected $fillable = ['name', 'description', 'price', 'image_path', 'product_type'];
}


