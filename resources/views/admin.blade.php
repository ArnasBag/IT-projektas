@extends('layouts.app')

@section('content')
<div class="main-container d-flex flex-column align-items-center justify-content-center vh-75 vw-100 ">
    <div class="w-75 h-75 p-5 d-flex flex-column justify-content-center align-items-center secondary-container" style="background-color: #252a37; border-radius: 25px;">
        <table class="table" style="color: white;">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Vardas</th>
                <th scope="col">Pavardė</th>
                <th scope="col">Konsultantas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Arnas</td>
                    <td>Bagočius</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </td>

                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jonas</td>
                    <td>Jonaitis</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Petras</td>
                    <td>Petraitis</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>    
</div>
@endsection