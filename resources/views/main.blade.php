@extends('layouts.app')

@section('content')
<div class="container mt-5">
       <h4 style="margin: 0px;">Jūsų kreditų skaičius: 7</h4>
    @if($reservation === null)
        <a href="{!! route('rezervacijos_kurimas') !!}" class="btn btn-main mt-5">Kurti rezervaciją</a>
    @else
        <h1 class="mt-5">Jūsų rezervacija:</h1>
        <div class="d-flex justify-content-between p-5" style="background-color: #252a37; border-radius: 25px;">
            <div>
                <h3>Rezervacijos id: {{$reservation->id}} | {{$reservation->reservation_date}}</h3>
                <p>Aprašymas: {{$reservation->problem_description}}</p>
            </div>
            <div>
                <p>Liko laiko: 19d 14h 13min 55s</p>
                <a href="{{ url('/consultation/' . $reservation->id) }}" class="btn btn-main">Į konsultaciją</a>
            </div>
        </div>
    @endif
</div>




@endsection