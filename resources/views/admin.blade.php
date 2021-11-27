@extends('layouts.app')

@section('content')
    <form method="POST" action="/admin/update">
        @csrf
        <button type="submit" class="btn btn-main">
            Atnaujinti
        </button>

        <table class="table mt-5" style="color: white; width: 75vw; margin-left: auto; margin-right: auto;">
            <thead>
                <tr>
                    <th scope="col">Vardas</th>
                    <th scope="col">E-paštas</th>
                    <th scope="col">Kreditai</th>
                    <th scope="col">Konsultantas</th>
                    <th scope="col">Pirkimai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><input type="number" name="credits[{{$user->id}}]" value={{$user->credits}} ></td>
                        <td>
                            <div class="form-check">
                                <input {{$user->type == 'consultant' ? "checked" : ""}} class="form-check-input" type="checkbox" value="consultant" name="consultants[{{$user->id}}]">
                            </div>
                        </td>
                        <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Peržiūrėti pirkimus
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="form-check m-1">
                                    @foreach($user->purchases as $purchase)
                                        @if(!$purchase->accepted)
                                            <input class="form-check-input" name="accepted[{{$purchase->id}}]" type="checkbox" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Kreiditų skaičius: {{$purchase->credit_amount}}
                                            </label>
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </form>
@endsection