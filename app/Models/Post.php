<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'post',
        // Add other attributes that can be mass-assigned here
    ];

    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function hashtags(){
    return $this->belongsToMany(Hashtag::class);
    }
}
