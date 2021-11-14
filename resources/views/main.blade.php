@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="chat-message2" style="display: inline-block !important;"> 
       <h4 style="margin: 0px;">Jūsų kreditų skaičius: 7</h4>
    </div>     
    <h1 class="mt-5">Jūsų rezervacija:</h1>
    <div class="d-flex justify-content-between p-5" style="background-color: #252a37; border-radius: 25px;">
        <div>
            <h3>Rezervacijos nr. 1 2021-01-01</h3>
            <p>Aprašymas: Nežinau kaip prijungti Wi-Fi</p>
        </div>
        <div>
            <p>Liko laiko: 19d 14h 13min 55s</p>
            <a href="{!! route('konsultacija') !!}" class="btn btn-main">Į konsultaciją</a>
        </div>
    </div>
    <a href="{!! route('rezervacijos_kurimas') !!}" class="btn btn-main mt-5">Kurti rezervaciją</a>
</div>




@endsection