<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'url', 'image'];

    public function followers(){
        return $this->belongsToMany('App\Models\User');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
