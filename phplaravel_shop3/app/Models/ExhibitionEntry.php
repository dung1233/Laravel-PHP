<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExhibitionEntry extends Model
{
    protected $fillable = [
        'user_id', 'exhibition_id', 'name', 'image_path', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exhibition()
    {
        return $this->belongsTo(Event::class, 'exhibition_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'exhibition_entry_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

