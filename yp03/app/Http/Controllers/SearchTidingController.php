<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Tiding;
use Illuminate\Http\Request;

class SearchTidingController extends Controller
{
    public function getResults(Request $request){
        $query = $request->input('query');

        if(!$query){
            redirect()->route('home');
        }

        $tidinges = Tiding::where(DB::raw("CONCAT (title)"),
            "LIKE", "%{$query}%")
            ->get();

        return view('searchTiding.results')->with('tidings', $tidinges);
    }
}
