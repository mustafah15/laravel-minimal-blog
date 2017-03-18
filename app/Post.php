<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'category_id',
        'content',
        'title'
    ];


    public function category()
    {
        return $this->belongsTo('App\Category','id','category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','post_id','id');
    }
}
