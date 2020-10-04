<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skola;

class MapController extends Controller
{
    public function index()
    {
        $skoly = Skola::all();
        return view('maps.leaflet')->with('skoly', $skoly);

    }
}
