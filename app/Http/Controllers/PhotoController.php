<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        return Photo::all();
    }

    public function show(Photo $photo)
    {
        return $photo;
    }

    public function store(Request $request)
    {
        return Photo::create($request->all());
    }

    public function update(Request $request, Photo $photo)
    {
        $photo->update($request->all());

        return $photo;
    }

    public function delete(Request $request, Photo $photo)
    {
        $photo->delete();

        return 204;
    }
}
