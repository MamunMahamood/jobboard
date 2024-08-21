<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajob;

class HomeController extends Controller
{
    public function home(){
        
        $jobs = Ajob::all();
        $totaljobs = Ajob::all()->count();
        return view('index', compact('jobs', 'totaljobs'));
        
    }
    //
}
