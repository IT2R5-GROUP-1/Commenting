<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'parent_id', 'username', 'text'];

    // Define relationship with Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Define relationship with parent comment (if it's a reply)
    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
