<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return Gallery::all();
    }

    public function show(Gallery $gallery)
    {
        return $gallery;
    }

    public function store(Request $request)
    {
        return Gallery::create($request->all());
    }

    public function update(Request $request, Gallery $gallery)
    {
        $gallery->update($request->all());

        return $gallery;
    }

    public function delete(Request $request, Gallery $gallery)
    {
        $gallery->delete();

        return 204;
    }
}
