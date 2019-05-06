<!-- Style page -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style>
    .titreRapport
    {
        background-color:#eeeeee;
    }
    .erreur{
        color: red;
    }
</style>
<!-- Si il y a des rondes -->
@if(count($donneesRapport)>0)
     <!-- Pour chaque rondes qui est une ronde -->
    @foreach($donneesRapport as $donnees)
            <!-- On regarde si les idPremierPointeau de la table 
            mains courantes sont des id de la table historiquepointeau -->   
            @if($erreurRonde->contains('idPremierPointeau',$donnees->id))
                <!-- On affiche un texte si il y a eu des erreurs -->
                <h1>Rapport avec erreur</h1>
            @else
                <h1>Rapport sans erreur</h1>    
            @endif<!-- fin boucle if -->    
        <br>
        <br>
        <ul class="list-group">
            <li class="list-group-item">Date : {{$donnees->date}}</li>
            <li class="list-group-item">Agent : {{$donnees->nom}} {{$donnees->prenom}}</li>
            <li class="list-group-item">Ronde : {{$donnees->nomrondes}}</li>
            <li class="list-group-item">NumeroRonde : {{$donnees->numeroRonde}}</li>
            <br>
            <br>
        </ul>  
        
        <table class="table table-bordered">
            <thead class="titreRapport">
                <tr>
                    <th>ID</th>
                    <th>Poiteaux</th>
                    <th>Heure de pointage</th>
                    <th>Retard</th>
                    <th>Commentaire</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody> 
                <!-- Pour la ronde qui est le pointeau -->
                @foreach($donneesNumeroRonde as $numeroRondeCourante) 
                    <!--Si il y a des erreurs-->
                    @if($erreurRonde->contains('idHistoriquePointeau',$numeroRondeCourante->id))
                        <!-- Pour la ronde avec erreurs -->
                        <tr class="erreur"> 
                            <td>{{$numeroRondeCourante->id}}</td>
                            <td>{{$numeroRondeCourante->lieu}}</td>
                            <td>{{$numeroRondeCourante->date}}</td>
                            <td></td>
                            <!-- commentaire -->
                            <!-- Pour la ronde qui est un pointeau avec erreur -->
                            @foreach($donneesNumeroRondeErreur as $pointeauxCourantErreur)
                                <!--Si le idHistoriquePointeau de la table mainscourantes et égal à l'id de historiquepointeau-->
                                @if($pointeauxCourantErreur->idHistoriquePointeau == $numeroRondeCourante->id)
                                    @if($pointeauxCourantErreur->photos == 0)
                                        <td>{{$pointeauxCourantErreur->texte}}</td>
                                    @else
                                        @if($pointeauxCourantErreur->photos == 1)
                                        {!! Form::open(['url' => '/ronde/rapport/photos']) !!}
                                        <td> 
                                        {{ Form::hidden('idmainscourantes',$numeroRondeCourante->id) }}
                                        {!! Form::submit('Selectionnez') !!}
                                        </td>
                                        {!! Form::close() !!}
                                        @endif
                                    @endif
                                @endif 
                            @endforeach
                        </tr>
                    @else
                    <tr> 
                        <td>{{$numeroRondeCourante->id}}</td>
                        <td>{{$numeroRondeCourante->lieu}}</td>
                        <td>{{$numeroRondeCourante->date}}</td>
                        <td></td>       
                        <td></td>
                        <td></td>
                    </tr> 
                    @endif
                @endforeach<!-- fin boucle idtable -->       
            </tbody>
        </table>      
    @endforeach<!-- fin boucle idtable -->
@endif <!-- fin count ronde>0 -->

<br>
<br>
<br>
<button onclick="history.back()">Retour</button>



