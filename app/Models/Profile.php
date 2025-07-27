<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
        'bio',
        'friends',
        'posts',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
