<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];

    public function comment()
    {
        return $this->hasOne(comment::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class);
    }
}
