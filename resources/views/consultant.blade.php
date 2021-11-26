@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <a href="{!! route('konsultacijos_kurimas') !!}" class="btn btn-main">Kurti konsultaciją</a>
    <h1 class="mt-5">Jūsų konsultacijos</h1>
    <div class="d-flex flex-column">
        @foreach($consultations as $consultation)
            <div class="d-flex justify-content-between p-5 mb-5" style="background-color: #252a37; border-radius: 25px;">
                <div>
                    <h3>Konsultacija id: {{ $consultation->id }}</h3>
                    <h3>Data: {{ $consultation->date }}</h3>
                </div>
                <div>
                    <p>Liko laiko: 19d 14h 13min 55s</p>
                    <a href="{{ url('/consultation/'. $consultation->id)}}" class="btn btn-main">Į konsultaciją</a>
                </div>
            </div>
        @endforeach
    </div>

    <h1 class="mt-5">Jūsų notifikacijos</h1>
    <div class="d-flex flex-column">
        @foreach($notifications as $notification)
            <div class="d-flex justify-content-between p-5 mb-5" style="background-color: #252a37; border-radius: 25px;">
                <h3>{{ $notification->notifiable_id }}</h3>
                <a href="{{ url('/quick-help/' . 1) }}" class="btn btn-main">Į konsultaciją</a>              
            </div>
        @endforeach
    </div>
    
</div>
@endsection
