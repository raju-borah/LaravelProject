<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable=[
        'comment_id',
        'author',
        'is_active',
        'body',
        'email',
        'photo'
    ];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
