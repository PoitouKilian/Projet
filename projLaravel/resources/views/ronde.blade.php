<!-- Style page -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Style tableau -->
<style>
    .titreRapport
    {
        background-color:#eeeeee;
    }
    .erreur{
        color: red;
    }
</style>
@extends('layouts.app')

@section('content')

<!-- Tableau de recherche-->
<div class="container">
    <div>
        <!-- Filtre de recherche Date-->
        {!! Form::open(['url' => 'ronde/submit']) !!}
        <table class="table table-bordered">
            <tr>
                <td>
                    <label for="startdate">Date début:</label>
                    <input type="date" id="date-start" name="date-start">
                </td>
                <td>
                    <label for="stopdate">Date fin:</label>
                    <input type="date" id="date-stop" name="date-stop">
                </td>
                <td>
                    <label for="starttime:">Heure de début:</label>
                    <input type="time" id="time-start" name="time-start"></td>
                <td>
                    <label for="stoptime">Heure de fin:</label>
                    <input type="time" id="time-stop" name="time-stop">
                </td>
                <td>
                    {!! Form::submit('VALIDER') !!}
                </td>
            </tr>
        </table>
        {!! Form::close() !!}
    </div>
</div>
<!-- Style du tableau -->
<div class="container">
    <div class="panel panel-primary filterable">
        <div class="panel-heading">
            <h3 class="panel-title">Ronde</h3>
        </div>
        <table class="table table-striped">
            <thead>
                <!-- En-Tête du tableau -->
                <tr>
                    <th>Date</th>
                    <th><input type="text" id="myInput" onkeyup="myFunctionAgents()" placeholder="Agents" enabled></th>
                    <th><input type="text" id="myInput2" onkeyup="myFunctionRonde()" placeholder="Ronde" enabled></th>
                    <th>Rapports</th>
                </tr>
            </thead>
            <!-- Corps du tableau -->
            <tbody id="myTable">
                <!-- Si il y a des rondes -->
                @if(count($rondeseffectuees)>0)
                    <!-- Pour chaque rondes qui est une ronde -->
                    @foreach($rondeseffectuees as $rondescourantes)
                        <!-- On prend que les premiers de la ronde -->
                        @if($rondescourantes->ordrePointeau == 1)
                            <!-- On regarde si les idHistoriquePointeau de la table 
                            mains courantes sont des id de la table historiquepointeau -->
                            @if($erreur->contains('idPremierPointeau',$rondescourantes->id))
                                <!-- On affiche les erreurs -->
                                <tr class="erreur">
                                  <td>{{$rondescourantes->date}}</td> 
                                  <td>{{$rondescourantes->nom}}</td>
                                  <td>{{$rondescourantes->nomrondes}}</td>
                                   {!! Form::open(['url' => '/ronde/rapport']) !!}
                                  <td> 
                                    {{ Form::hidden('idRapport',$rondescourantes->id) }}
                                    {{ Form::hidden('idNumeroRonde',$rondescourantes->numeroRonde) }}
                                  {!! Form::submit('Selectionnez') !!}
                                  </td>
                                 {!! Form::close() !!}
                                </tr>
                            @else    
                                <!-- sinon on affiche tout -->
                                <tr class="content">
                                    <td>{{$rondescourantes->date}}</td> 
                                    <td>{{$rondescourantes->nom}}</td>
                                    <td>{{$rondescourantes->nomrondes}}</td> 
                                    {!! Form::open(['url' => '/ronde/rapport']) !!}
                                    <td> 
                                    {{ Form::hidden('idRapport',$rondescourantes->id) }}
                                    {{ Form::hidden('idNumeroRonde',$rondescourantes->numeroRonde) }}
                                    {!! Form::submit('Selectionnez') !!}
                                    </td>
                                  {!! Form::close() !!}
                                </tr>    
                            @endif<!-- fin boucle if -->
                        @endif<!-- fin boucle if -->
                    @endforeach<!-- fin boucle ronde -->
                @endif <!-- fin count ronde>0 -->
            </tbody>
        </table>
    </div>
</div>
@endsection
<!-- Filtre pour les agents -->
<script>
function myFunctionAgents() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Parcourez toutes les lignes de la table et masquez celles qui ne correspondent pas à la requête de recherche
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<!-- Filtre pour les rondes -->
<script>
function myFunctionRonde() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Parcourez toutes les lignes de la table et masquez celles qui ne correspondent pas à la requête de recherche
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>