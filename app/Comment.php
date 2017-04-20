<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'content',
        'user_id',
        'post_id'
    ];

    public function User()
    {
        return $this->belongsTo("App\User", 'id', 'user_id');
    }
}
