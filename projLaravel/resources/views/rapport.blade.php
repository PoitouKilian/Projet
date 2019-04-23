<!-- Style page -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- Si il y a des rondes -->
@if(count($donneesRapport)>0)
     <!-- Pour chaque rondes qui est une ronde -->
    @foreach($donneesRapport as $donnees)
        <!-- On regarde si les idHistoriquePointeau de la table 
        mains courantes sont des id de la table historiquepointeau -->
        @if($erreur->contains('idHistoriquePointeau',$donnees->id))
            <!-- On affiche les erreurs -->
            <h1>Rapport avec erreur</h1>
            <br>
            <br>
            <ul class="list-group">
                <li class="list-group-item">Date : {{$donnees->date}}</li>
                <li class="list-group-item">Agent : {{$donnees->nom}}</li>
                <li class="list-group-item">Ronde : {{$donnees->nomrondes}}</li>
                <li class="list-group-item">IDHistoriquePointeau : {{$donnees->id}}</li>
                <li class="list-group-item">IDPointeau : {{$donnees->lieu}}</li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item">ordrePointeau : {{$donnees->ordrePointeau}}</li>
                <li class="list-group-item">numeroRonde : {{$donnees->numeroRonde}}</li>
            </ul>
        @else
        <h1>Rapport sans erreur</h1>
        <br>
        <br>
        <ul class="list-group">
            <li class="list-group-item">Date : {{$donnees->date}}</li>
            <li class="list-group-item">Agent : {{$donnees->nom}}</li>
            <li class="list-group-item">Ronde : {{$donnees->nomrondes}}</li>
            <li class="list-group-item">IDHistoriquePointeau : {{$donnees->id}}</li>
            <li class="list-group-item">IDPointeau : {{$donnees->lieu}}</li>
        </ul>

        <ul class="list-group">
            <li class="list-group-item">ordrePointeau : {{$donnees->ordrePointeau}}</li>
            <li class="list-group-item">numeroRonde : {{$donnees->numeroRonde}}</li>
        </ul>
        @endif<!-- fin boucle if -->
    @endforeach<!-- fin boucle idtable -->
@endif <!-- fin count ronde>0 -->

<button onclick="history.back()">Retour</button>



