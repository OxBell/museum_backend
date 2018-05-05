<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $fillable = ['name', 'description'];

    protected $with = ['owner', 'photos'];

    public function path()
    {
        return '/api/galleries/' . $this->id;
    }

    /**
     * Get the user for the gallery.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the photos for the gallery.
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
