<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $fillable = [
        'user_id', 'exhibition_entry_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exhibitionEntry()
    {
        return $this->belongsTo(ExhibitionEntry::class);
    }
}
