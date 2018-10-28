<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->type))
        {
            $items = Item::where('type', $request->type)->get();

            return response()->json($items);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item();

        $item = $this->updateData($item, $request);

        $item->save();

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item = $this->updateData($item, $request);

        $item->save();

        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response('deleted', 200);
    }

    private function updateData($item, $request) 
    {

        $item->name = data_get($request, 'name');
        $item->type = data_get($request, 'type');
        $item->category = data_get($request, 'category');
        $item->sub_category = data_get($request, 'sub_category');
        $item->url = data_get($request, 'url');
        $item->description = data_get($request, 'description');
        $item->short_description = data_get($request, 'short_description');
        $item->starts_at = Carbon::parse(data_get($request, 'starts_at'));
        $item->ends_at = Carbon::parse(data_get($request, 'ends_at'));
    
        $item->data = data_get($request, 'data');

        return $item;
    }

}
