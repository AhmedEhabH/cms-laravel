<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function hasTrashedPosts()
    {
        $trashedPosts = Post::onlyTrashed()->get();

        foreach($trashedPosts as $post)
        {
            if($post->hasCategory($this->id)) return true;
        }
        return false;
    }
}
