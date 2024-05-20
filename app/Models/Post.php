<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey="idpost";

    protected $fillable =[
        "idpost",
        "user_id",
        "titulo",
        "descripcion",
        "imagen"
    ];

    // public $timestamps=false;

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function comentarios()
    {
      return  $this->hasMany(Comentario::class,'post_id')->orderByRaw('created_at Desc');
    }

    public function likes(){
        return $this->hasMany(Like::class,'post_id');
    }

    public function checkPost(User $user)
    {
        return $this->likes->contains('user_id',$user->id);
    }


}
