@foreach($donneesPointeauErreur as $photo)
    @if($photo->photos >0)
    <img src="../../IMAGES/{{$photo->numeroRonde}}_{{$photo->idPointeau}}_{{$photo->photos}}.jpg" style="width: 50%;">
    <br>
    <br>
    @endif
@endforeach
<br>
<br>
<br>
<button onclick="history.back()">Retour</button>

