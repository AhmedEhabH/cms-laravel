<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at'
    ];

    /**
     * Delete post image from storage
     */
    public function deleteImage()
    {
        if(Storage::exists($this->image))
        {
            Storage::delete($this->image);
        }
    }
}
