@extends('layouts.app')


@section('content')
<div class="main-container d-flex flex-column align-items-center justify-content-center">
    <div class="w-75 h-75 p-5 d-flex flex-column justify-content-center align-items-center secondary-container" style="background-color: #252a37; border-radius: 25px;">
        <h1 style="font-size: 48px;" class="mb-5">Video demonstracijos</h1>
        <div class="mb-5">
            <iframe width="420" height="315"
            src="https://www.youtube.com/embed/JddotzDLCyY">
            </iframe>
            <h3>Kaip atsinaujinti mobilųjį telefoną</h3>
        </div>
        <div class="mb-5">
            <iframe width="420" height="315"
            src="https://www.youtube.com/embed/kwkjQRT42Qk">
            </iframe>
            <h3>Geriausi 2021 metų mobilūs telefonai</h3>
        </div>
        <div class="mb-5">
            <iframe width="420" height="315"
            src="https://www.youtube.com/embed/8XurHgNoZhs">
            </iframe>
            <h3>Kaip prijungti telefoną prie Wi-Fi</h3>
        </div>
    </div>    
</div>
@endsection