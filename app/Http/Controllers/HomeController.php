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
        $page = Page::firstOrCreate(['name' => 'pradinis']);
        
        return view('index', compact('page'));
    }

    public function parodos()
    {
        $parodos = Item::where('type', 'parodos')->get();
        $page = Page::firstOrCreate(['name' => 'parodos']);

        return view('parodos', compact('parodos', 'page'));
    }

    public function paroda($url)
    {
        $paroda = Item::where('type', 'parodos')->where('url', $url)->first();

        return view('paroda', compact('paroda'));
    }

    public function menininkai()
    {
        $menininkai = Item::where('type', 'menininkai')->get();
        $page = Page::firstOrCreate(['name' => 'menininkai']);

        return view('menininkai', compact('menininkai', 'page'));
    }

    public function menininkas($url)
    {
        $menininkas = Item::where('type', 'menininkai')->where('url', $url)->first();

        return view('menininkas', compact('menininkas'));
    }

    public function renginiai()
    {
        $renginiai = Item::where('type', 'renginiai')->get();
        $page = Page::firstOrCreate(['name' => 'renginiai']);

        return view('renginiai', compact('renginiai', 'page'));
    }

    public function renginys($url)
    {
        $renginys = Item::where('type', 'renginiai')->where('url', $url)->first();

        return view('renginys', compact('renginys'));
    }

    public function dizainai()
    {
        $dizainai = Item::where('type', 'dizainas')->get();
        $page = Page::firstOrCreate(['name' => 'dizainas']);

        return view('dizainai', compact('dizainai', 'page'));
    }

    public function dizainas($url)
    {
        $dizainas = Item::where('type', 'dizainas')->where('url', $url)->first();

        return view('dizainas', compact('dizainas'));
    }

    public function fotografija()
    {
        $page = Page::firstOrCreate(['name' => 'fotografija']);

        return view('fotografija', compact('page'));
    }

    public function dirbtuves()
    {
        $dirbtuves = Item::where('type', 'dirbtuves')->get();
        $page = Page::firstOrCreate(['name' => 'dirbtuves']);

        return view('dirbtuves', compact('dirbtuves', 'page'));
    }

    public function dirbtuve($url)
    {
        $dirbtuve = Item::where('type', 'dirbtuves')->where('url', $url)->first();

        return view('dirbtuve', compact('dirbtuve'));
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
        $page = Page::firstOrCreate(['name' => 'kontaktai']);
        
        return view('kontaktai', compact('page'));
    }
}
