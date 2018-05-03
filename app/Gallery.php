<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    /**
     * Get the user for the gallery.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the photos for the gallery.
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
