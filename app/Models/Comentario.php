<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable=[
        "post_id",
        "user_id",
        "comentario"
    ];

    public function post(){
        $this->hasOne(Post::class);
    }

    // public function getFechaCreacionAttribute()
    // {
    //     return Carbon::parse($this->created_at)->format('d/m/Y');
    // }
}
