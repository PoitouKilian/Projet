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
                ->join('rondes','rondes.idrondes','=','historiquepointeau.idRonde')
                ->select('agents.nom','historiquepointeau.date','rondes.nomrondes')
                ->get();
        
        return view('ronde')->with('ronde',$Mesure);
        //return $Mesure;
        }
        
       public function submitRechercheRonde(Request $request){
           //Recuperation de la date de début de recherche
           $dateStart = $request->input('date-start');
           $timeStart = $request->input('time-start');
           if($dateStart == "")
           {
               $dateStart = "0000-00-00";
           }
           if($timeStart =="")
           {
               $timeStart ="00:00:01";
           }
           $combinedDTStart = date('Y-m-d H:i:s', strtotime("$dateStart $timeStart"));
           
           //Recuperation de la date de fin de recherche
           $dateStop = $request->input('date-stop');
           $timeStop = $request->input('time-stop');
           if($dateStop == "")
           {
               $dateStop = date("Y-m-d");
           }
           if($timeStop =="")
           {
               $timeStop ="00:00:00";
           }
           $combinedDTStop = date('Y-m-d H:i:s', strtotime("$dateStop $timeStart"));
           
           $date = \App\historiquepointeau::all()->where('date','>', $combinedDTStart)->where('date','>', $combinedDTStop)->sortByDesc('date');
       
           return view('ronde')->with('ronde',$date);
           }
        
}
