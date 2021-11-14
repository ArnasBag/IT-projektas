@extends('layouts.app')

@section('content')
<div class="main-container d-flex flex-column align-items-center justify-content-center vh-75 vw-100 ">
    <div class="w-75 h-75 p-5 d-flex flex-column justify-content-center align-items-center secondary-container" style="background-color: #252a37; border-radius: 25px;">
        <h1 style="font-size: 48px;">TeleHelp</h1>
        <h3>Naudojimosi mobiliaisias telefonais pagalbos portalas</h3>
        <a href="{!! route('register') !!}" class="btn btn-main mt-3">PRADĖTI</a>    
    </div>
    <div class="vw-75 mt-3 d-flex flex-row-reverse">
        <h5>Darbą atliko: Arnas Bagočius IFF-9/4</h5>
    </div>
    
</div>
@endsection
