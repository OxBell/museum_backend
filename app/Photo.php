<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = ['name', 'description'];

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
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
