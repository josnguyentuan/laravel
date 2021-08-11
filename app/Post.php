<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ['title', 'short_description', 'status', 'cate_id'];
    public function categories(){
        return $this->belongsTo(Category::class, 'cate_id');
    }
}
