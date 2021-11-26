@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="w-75 ">
        <div class="card" style="background-color: #252a37; border-radius: 25px;">
            <div class="card-header">
                <h4 class="card-title">Konsultacija</h4>
            </div>
            <div class="d-flex flex-column p-5 scrollable">
            </div>
            <div class="card-footer p-3 d-flex justify-content-between">
                <div>
                    <i class="fas fa-search mr-1"></i>
                    <input class="message-input" type="text" placeholder="Įrašykite žinutę...">

                </div>
                <i class="fas fa-paper-plane mr-3"></i>
            </div>
        </div>
    </div>
</div>


@endsection