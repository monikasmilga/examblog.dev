<?php

namespace App\Models;

class EBPosts extends CoreModel
{
    protected $table = 'eb_posts';

    protected $fillable = ['id', 'user_id','post_title', 'post_text', 'image'];
}
