<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserWelcome;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            // create profile
            $user->profile()->create([
                'title' => $user->name
            ]);
            // send confirmation mail
            Mail::to($user->email)->send(new NewUserWelcome($user->name));
        });
    }

    public function following(){
        return $this->belongsToMany('App\Models\Profile');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post')->orderBy('created_at', 'DESC');
    }

    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }

}
