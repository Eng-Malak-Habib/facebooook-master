<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillable = [
        'user_id',
        'content',
    ];
    public function post()
    {
        return $this->belongsTo(posts::class,'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
