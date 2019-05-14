@extends('layouts.app')
<!-- Style page -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

@section('content')
<h1>Statistique</h1> 



<img src="IMAGES/diagramme.jpg" style="width: 100%; margin-left: 30%;">
<br>
<br>
<br>
<div class="container">
 <table class="table table-bordered">
            <thead class="titreRapport">
                <tr>
                    <th>Nombre d'erreur dans chaque ronde</th>
                    <th>Nombre d'erreur</th>
                    <th>Nombre de ronde correct</th>
                </tr>
            </thead>
            <tbody> 
                    <tr> 
                        <td style="width:30%;"><input type="button" value="Selectionnez"></td>
                        <td style="width:30%;"><input type="button" value="Selectionnez"></td>
                        <td style="width:30%;"><input type="button" value="Selectionnez"></td>
                    </tr> 
            </tbody>
        </table>   
    
    <table class="table table-bordered">
            <thead class="titreRapport">
                <tr>
                    <th>Ronde qui à généré le plus de retard</th>
                    <th>Ronde qui à généré le plus d'avance</th>
                </tr>
            </thead>
            <tbody> 
                    <tr> 
                        <td style="width:30%;"><input type="button" value="Selectionnez"></td>
                        <td style="width:30%;"><input type="button" value="Selectionnez"></td>
                    </tr> 
            </tbody>
        </table>   
</div>
@endsection
