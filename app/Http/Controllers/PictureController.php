<?php

namespace App\Http\Controllers;

use Image;
use Storage;
use App\Picture;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = Image::make($request->image)
        ->orientate()
        ->resize('1080', '1080', function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })
        ->encode('jpg', 90);

        $picture = new Picture();

        $picture->path = 'public/nuotraukos/' . Uuid::uuid1(). '.jpg';

        Storage::put($picture->path, (string)$image, 'public');

        $url = Storage::url($picture->path);

        $picture->url = $url;

        $picture->save();

        return response()->json($picture);
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        Storage::delete($picture->path);
        
        $picture->delete();

        return response(200);
    }
}
