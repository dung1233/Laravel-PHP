<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;
    protected $table = 'products'; // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id'; // Tên của khóa chính
    protected $fillable = ['name', 'description', 'price', 'image_path', 'product_type'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
