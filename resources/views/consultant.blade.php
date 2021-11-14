@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <a href="{!! route('konsultacijos_kurimas') !!}" class="btn btn-main">Kurti konsultaciją</a>
    <h1 class="mt-5">Jūsų konsultacijos</h1>
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between p-5" style="background-color: #252a37; border-radius: 25px;">
                <div>
                    <h3>Konsultacija nr. 1 </h3>
                    <h3>Data: 2030-01-01</h3>
                </div>
                <div>
                    <p>Liko laiko: 19d 14h 13min 55s</p>
                    <a href="{!! route('konsultacija') !!}" class="btn btn-main">Į konsultaciją</a>
                </div>
        </div>
        <div class="d-flex justify-content-between p-5 mt-5" style="background-color: #252a37; border-radius: 25px;">
                <div>
                    <h3>Konsultacija nr. 2 </h3>
                    <h3>Data: 2030-02-02</h3>
                </div>
                <div>
                    <p>Liko laiko: 19d 14h 13min 55s</p>
                    <a href="{!! route('konsultacija') !!}" class="btn btn-main">Į konsultaciją</a>
                </div>
        </div>
        <div class="d-flex justify-content-between p-5 mt-5" style="background-color: #252a37; border-radius: 25px;">
                <div>
                    <h3>Konsultacija nr. 3 </h3>
                    <h3>Data: 2030-03-03</h3>
                </div>
                <div>
                    <p>Liko laiko: 19d 14h 13min 55s</p>
                    <a href="{!! route('konsultacija') !!}" class="btn btn-main">Į konsultaciją</a>
                </div>
        </div>
    </div>
    
</div>
@endsection
