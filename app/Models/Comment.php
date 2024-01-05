<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function blog()//blog_id
    {
        return $this->belongsTo(Blog::class);
    }

    public function author()//author_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
