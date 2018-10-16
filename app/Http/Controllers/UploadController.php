<?php

namespace App\Http\Controllers;

use Image;
use Storage;
use App\Picture;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{


    public function storePicture(Request $request)
    {

        if($request->has('image')) {

            $file = $request->image;

            $image = Image::make($file)->orientate()->resize(1920, 1920, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 90);

            $picture = new Picture();

            $picture->path = 'public/nuotraukos/'. $request->type . '/' . Uuid::uuid1(). '.jpg';
            Storage::put($picture->path, (string)$image, 'public');
            $picture->url = Storage::url($picture->path);
            $picture->type = $request->type;
            $picture->save();

            return response()->json($picture);          
        }

        else {
            return error('No file to upload');
        }

    }

    public function delete(Picture $picture) {

        Storage::delete($picture->path);

        $picture->delete();

        return response('picture deleted', 200);
    }
}
