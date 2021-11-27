@extends('layouts.app')

@section('content')
<div class="container mt-5">
       <h4 style="margin: 0px;">Jūsų kreditų skaičius: {{auth()->user()->credits}}</h4>
       <a id="help" href="{{ url('quick-help/' . auth()->user()->id) }}">Greita pagalba</a>
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

<script type="text/javascript"> 

      $(document).ready( function() {
        $('#help').hide();
        $('#help').delay(1000).fadeIn();
        console.log("show")
      });
    </script>


@endsection