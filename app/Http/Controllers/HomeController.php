<?php

namespace App\Http\Controllers;

use App\Page;
use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function parodos()
    {
        $shows = Item::where('type', 'paroda')->get();

        return view('parodos', compact('shows'));
    }

    public function menininkai()
    {
        $menininkai = Item::where('type', 'menininkas')->get();

        return view('menininkai', compact('menininkai'));
    }

    public function menininkas($url)
    {
        $meninkas = Item::where('type', 'menininkas')->where('url', $url)->first();

        return view('menininkai', compact('meninkas'));
    }

    public function renginiai()
    {
        $renginiai = Item::where('type', 'renginys')->get();

        return view('renginiai', compact('renginiai'));
    }

    public function dizainas()
    {
        return view('dizainas');
    }

    public function fotografija()
    {
        $page = Page::firstOrCreate(['name' => 'fotografija']);

        return view('fotografija', compact('page'));
    }

    public function dirbtuves()
    {
        return view('dirbtuves');
    }

    public function meniu()
    {
        $page = Page::firstOrCreate(['name' => 'meniu']);

        return view('meniu', compact('page'));
    }

    public function ledai()
    {
        $page = Page::firstOrCreate(['name' => 'ledai']);

        return view('ledai', compact('page'));
    }

    public function nuoma()
    {
        $page = Page::firstOrCreate(['name' => 'nuoma']);

        return view('nuoma', compact('page'));
    }

    public function kontaktai()
    {
        // $page = Page::firstOrCreate(['name' => 'kontaktai']);
        
        return view('kontaktai');
    }
}
