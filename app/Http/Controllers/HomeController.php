<?php

namespace App\Http\Controllers;

use App\Page;
use App\ArtShow;
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
        $shows = ArtShow::all();

        return view('parodos', compact('shows'));
    }

    public function menininkai()
    {
        return view('menininkai');
    }

    public function renginiai()
    {
        return view('renginiai');
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
        return view('kontaktai');
    }
}
