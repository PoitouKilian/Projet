@foreach($donneesPointeauErreur as $photo)
    <img src="../../IMAGES/{{$photo->numeroRonde}}_{{$photo->idPointeau}}_{{$photo->photos}}.jpg" style="width: 50%;">
    <br>
    <br>
@endforeach
<br>
<br>
<br>
<button onclick="history.back()">Retour</button>

