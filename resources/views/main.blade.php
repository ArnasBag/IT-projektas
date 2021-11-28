@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h4 style="margin-top: auto; margin-bottom: auto;">Jūsų kreditų skaičius: {{auth()->user()->credits}}</h4>
        <a id="help" class="btn btn-help"href="{{ url('quick-help/' . auth()->user()->id) }}">Greita pagalba</a>
    </div>

    @if($reservation === null)
        <a href="{!! route('rezervacijos_kurimas') !!}" class="btn btn-main mt-5">Kurti rezervaciją</a>
    @else
        <h1 class="mt-5">Jūsų rezervacija:</h1>
        <div class="d-flex justify-content-between p-5" style="background-color: #252a37; border-radius: 25px;">
            <div>
                <h3>Rezervacijos id: {{$reservation->id}} | {{$consultation->date}}</h3>
                <p>Aprašymas: {{$reservation->problem_description}}</p>
            </div>
            <div>
                <a href="{{ url('/consultation/' . $reservation->consultation_id) }}" class="btn btn-main">Į konsultaciją</a>
            </div>
        </div>
    @endif
</div>

<script type="text/javascript"> 

      $(document).ready( function() {
        $('#help').hide();
        $('#help').delay(15000).fadeIn();
        console.log("show")
      });
    </script>


@endsection