<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\historiquepointeau;

class RondesController extends Controller
{
        
    public function retourMesureTableau(){
        $Mesure= DB::table('historiquepointeau')
                ->join('agents','agents.idAgent','=','historiquepointeau.idAgent')
                ->select('agents.nom','historiquepointeau.date','historiquepointeau.idRonde')
                ->get();
        
        return view('ronde')->with('ronde',$Mesure);
        //return $ronde;
        }
        
}
