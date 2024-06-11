<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'ticket_type', 'name', 'quantity', 'total_price', 'date', 'time','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
