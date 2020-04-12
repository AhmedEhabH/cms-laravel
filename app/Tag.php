<?php

namespace App;

use App\Post;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function hasTrashedPosts()
    {
        $trashedPosts = Post::onlyTrashed()->get();

        // dd($trashedPosts);
        foreach($trashedPosts as $post)
        {
            if($post->hasTag($this->id)) return true;
        }
        return false;
    }

}
