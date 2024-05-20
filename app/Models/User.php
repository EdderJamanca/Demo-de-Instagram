<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "nombre",
        "email",
        "username",
        "password",
        "email_verified_at",
        "token_register",
        "imagen"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function post()
    {
        $this->hasMany(Post::class);
    }

    public function likes(){
        return $this->hasMany(Like::class,'user_id');
    }

    // segidores
    public function follows(){
        return $this->belongsToMany(User::class,'follows','user_id','follow_id');
    }
    // seguidores

    public function followins(){
        return $this->belongsToMany(User::class,'follows','follow_id','user_id');
    }

    public function siguiendo(User $user){
        return $this->follows->contains($user->id);
    }
}
