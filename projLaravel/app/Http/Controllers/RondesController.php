<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\historiquepointeau;
use App\Charts\Chart;

class RondesController extends Controller {
    /*     * Récupération des mesures pour le tableau ronde* */

    public function retourMesureTableau() {
        /*         * Recuperation de toutes les rondes* */
        $rondeseffectuees = DB::table('historiquepointeau')
                ->join('agents', 'agents.idAgent', '=', 'historiquepointeau.idAgent')
                ->join('rondes', 'rondes.idrondes', '=', 'historiquepointeau.idRonde')
                ->select('agents.nom', 'historiquepointeau.date', 'rondes.nomrondes', 'historiquepointeau.id', 'historiquepointeau.ordrePointeau', 'historiquepointeau.numeroRonde')
                ->latest('historiquepointeau.date')
                ->get();

        /** Recupération des erreurs * */
        $erreur = DB::table('mainscourantes')
                ->select('mainscourantes.idHistoriquePointeau', 'mainscourantes.idPremierPointeau')
                ->get();


        return view('ronde')->with('rondeseffectuees', $rondeseffectuees)->with('erreur', $erreur);
    }

    /*     * Récupération des dates dans les filtres dates* */

    public function submitRechercheRonde(Request $request) {
        //Date de début
        $dateStart = $request->input('date-start');
        $timeStart = $request->input('time-start');
        if ($dateStart == "") {
            $dateStart = "0000-00-00";
        }
        if ($timeStart == "") {
            $timeStart = "00:00:00";
        }
        $combinedDTStart = date('Y-m-d H:i:s', strtotime("$dateStart $timeStart"));

        //Date de fin
        $dateStop = $request->input('date-stop');
        $timeStop = $request->input('time-stop');
        if ($dateStop == "") {
            $dateStop = date("Y-m-d");
        }
        if ($timeStop == "") {
            $timeStop = "23:59:59";
        }
        $combinedDTStop = date('Y-m-d H:i:s', strtotime("$dateStop $timeStop"));

        //Verification si date debut est bien superieur a date de fin
        if ($combinedDTStart > $combinedDTStop) {
            //Inversion des dates
            $tmp = $combinedDTStart;
            $combinedDTStart = $combinedDTStop;
            $combinedDTStop = $tmp;
        }
        //On reprend les informations du tableau          

        $rondeseffectuees = DB::table('historiquepointeau')
                ->join('agents', 'agents.idAgent', '=', 'historiquepointeau.idAgent')
                ->join('rondes', 'rondes.idrondes', '=', 'historiquepointeau.idRonde')
                ->select('agents.nom', 'historiquepointeau.date', 'rondes.nomrondes', 'historiquepointeau.id', 'historiquepointeau.ordrePointeau', 'historiquepointeau.numeroRonde')
                ->latest('historiquepointeau.date')
                ->where('date', '>=', $combinedDTStart)
                ->where('date', '<=', $combinedDTStop)
                ->latest('date')
                ->get();

        /** Recupération des erreurs * */
        $erreur = DB::table('mainscourantes')
                ->select('mainscourantes.idHistoriquePointeau', 'mainscourantes.idPremierPointeau')
                ->get();

        return view('ronde')->with('rondeseffectuees', $rondeseffectuees)->with('erreur', $erreur);
    }

    public function boutonRapport(Request $request) {
        /** Récupération des informations pour le rapport**/
        $idrapport = $request->idRapport;

        $donneesRapport = DB::table('historiquepointeau')
                        ->join('agents', 'agents.idAgent', '=', 'historiquepointeau.idAgent')
                        ->join('rondes', 'rondes.idrondes', '=', 'historiquepointeau.idRonde')
                        ->join('pointeaux', 'pointeaux.idpointeaux', '=', 'historiquepointeau.idPointeau')
                        ->select('agents.nom', 'agents.prenom', 'historiquepointeau.date', 'rondes.nomrondes', 'historiquepointeau.id', 'historiquepointeau.ordrePointeau', 'historiquepointeau.numeroRonde', 'pointeaux.lieu')
                        ->where('id', '=', $idrapport)->get();

        $idNumeroRonde = $request->idNumeroRonde;

        $donneesNumeroRonde = DB::table('historiquepointeau')
                        ->join('agents', 'agents.idAgent', '=', 'historiquepointeau.idAgent')
                        ->join('rondes', 'rondes.idrondes', '=', 'historiquepointeau.idRonde')
                        ->join('pointeaux', 'pointeaux.idpointeaux', '=', 'historiquepointeau.idPointeau')
                        ->select('agents.nom', 'agents.prenom', 'historiquepointeau.date', 'rondes.nomrondes', 'historiquepointeau.id', 'historiquepointeau.ordrePointeau', 'historiquepointeau.numeroRonde', 'pointeaux.lieu')
                        ->where('numeroRonde', '=', $idNumeroRonde)->get();

        $donneesNumeroRondeErreur = DB::table('historiquepointeau')
                ->join('pointeaux', 'pointeaux.idpointeaux', '=', 'historiquepointeau.idPointeau')
                ->join('mainscourantes', 'mainscourantes.idHistoriquePointeau', '=', 'historiquepointeau.id')
                ->select('historiquepointeau.date', 'historiquepointeau.id', 'historiquepointeau.numeroRonde', 'pointeaux.lieu', 'mainscourantes.texte', 'mainscourantes.photos', 'mainscourantes.idHistoriquePointeau')
                ->where('numeroRonde', '=', $idNumeroRonde)
                ->oldest('historiquepointeau.date')
                ->get();

        /** Recupération des erreurs * */
        $erreurRonde = DB::table('mainscourantes')
                ->select('mainscourantes.idHistoriquePointeau', 'mainscourantes.idPremierPointeau', 'mainscourantes.texte', 'mainscourantes.photos')
                ->get();

        return view('rapport')->with('donneesRapport', $donneesRapport)->with('donneesNumeroRonde', $donneesNumeroRonde)->with('donneesNumeroRondeErreur', $donneesNumeroRondeErreur)->with('erreurRonde', $erreurRonde);
    }

    public function boutonPhotos(Request $request) {
        /*         * Récupération des informations pour les photos* */
        $idmainscourantes = $request->idmainscourantes;

        $donneesPointeauErreur = DB::table('historiquepointeau')
                ->join('mainscourantes', 'mainscourantes.idHistoriquePointeau', '=', 'historiquepointeau.id')
                ->select('historiquepointeau.id', 'historiquepointeau.idPointeau', 'historiquepointeau.numeroRonde', 'mainscourantes.photos')
                ->where('historiquepointeau.id', '=', $idmainscourantes)
                ->get();

        return view('photos')->with('donneesPointeauErreur', $donneesPointeauErreur);
    }

    public function retourStatsNbErreur() {
        /**
          $labels = DB::table('mainscourantes')
          ->select('date')
          ->orderby('date', 'DESC')
          ->get();

          //Selection des températures
          $erreur = DB::table('mainscourantes')
          ->select('id')
          ->get();

          $dataErreur = array();
          foreach ($erreur as $erreur) {
          array_push($dataErreur, $erreur->id);
          }
          $newErreur= array_reverse($dataErreur);//Inversion de la position des valeurs
          //Pour les ranger dans l'ordre croissant de dates

          $dataLabels = array();
          foreach ($labels as $label) {
          array_push($dataLabels, $label->date);
          }
          $newDataLabels = array_reverse($dataLabels);//Inversion de la position des valeurs
          //Pour les ranger dans l'ordre croissant de dates


          //Creation du graphique pour l'affichages des mesures
          $chart = new Chart();
          $chart->title("Erreur dans les ronde");
          $chart->labels($newDataLabels);
          $chart->label("Valeurs");
          $chart->dataset("erreur", "line", $newErreur)->options(['color' => '#f8906c',]);

          //Retour de la vue avec le graphique
          return view('statistique', ['chart' => $chart]);* */
        return view('statistique');
    }

    public function login(Request $request) {

        $utilisateur = $request->input('uname');
        $mdp = $request->input('psw');

        $donneesUtilisateur = DB::table('responsables')
                ->select('responsables.login')
                ->get();

        $donneesMDP = DB::table('responsables')
                ->select('responsables.mdp')
                ->get();

        if ($utilisateur = $donneesUtilisateur) {
            if ($mdp = $donneesMDP) {
                return view('accueil');
            } else {
                return view('authentification');
            }
        } else {
            return view('authentification');
        }
    }

}
