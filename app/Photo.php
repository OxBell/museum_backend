<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = ['gallery_id', 'user_id', 'name', 'description', 'srcUrl'];

    protected $with = ['owner'];

    public function path()
    {
        return '/api/photos/' . $this->id;
    }

    /**
     * Get the gallery for the photo.
     */
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }

    /**
     * Get the user for the photo.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
