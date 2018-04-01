<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\ArtShow;
use Illuminate\Http\Request;

class ArtShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = ArtShow::all();

        return response()->json($shows);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artShow = new ArtShow();

        $artShow = $this->updateData($artShow, $request);

        $artShow->save();

        return response()->json($artShow);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArtShow  $artShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArtShow $artShow)
    {
        $artShow = $this->updateData($artShow, $request);

        $artShow->save();

        return response()->json($artShow);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArtShow  $artShow
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArtShow $artShow)
    {
        $artShow->delete();

        return response();
    }

    private function updateData($artShow, $request) 
    {

        $artShow->name = data_get($request, 'name');
        $artShow->url = data_get($request, 'url');
        $artShow->short_description = data_get($request, 'short_description');
        $artShow->description = data_get($request, 'description');
        $artShow->starts_at = Carbon::parse(data_get($request, 'starts_at'));
        $artShow->ends_at = Carbon::parse(data_get($request, 'ends_at'));
        $artShow->data = data_get($request, 'data');

        if(isset($request->starting_time)) {
            $artShow->starting_time = Carbon::parse($request->starting_time)->format('H:i:s');
        }
        else { $artShow->starting_time = null;}

        return $artShow;
    }

}
