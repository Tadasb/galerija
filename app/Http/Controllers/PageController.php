<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->name))
        {
            $page = Page::firstOrCreate(['name' => $request->name]);

            return response()->json($page);
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
        $page = new Page();

        $page = $this->updateData($page, $request);

        $page->save();

        return response()->json($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page = $this->updateData($page, $request);

        $page->save();

        return response()->json($page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return response();
    }

    private function updateData($page, $request) 
    {

        $page->name = data_get($request, 'name');
    
        $page->data = data_get($request, 'data');

        return $page;
    }

}
