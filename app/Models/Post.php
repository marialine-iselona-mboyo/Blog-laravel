<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'message',
        'genre_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}


