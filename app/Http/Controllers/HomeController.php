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
        return view('fotografija');
    }

    public function dirbtuves()
    {
        return view('dirbtuves');
    }

    public function meniu()
    {
        return view('meniu');
    }

    public function ledai()
    {
        return view('ledai');
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