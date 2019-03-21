<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\historiquepointeau;
use App\agents;

class RondesController extends Controller
{
        
    public function retourHistoriquepointeau(){
        $historiquepointeau= DB::table('historiquepointeau')->get();
        $agents= DB::table('agents')->get();
        
        return view('ronde')->with('historiquepointeau',$historiquepointeau)
                ->with('agents',$agents);
        }
        
}
