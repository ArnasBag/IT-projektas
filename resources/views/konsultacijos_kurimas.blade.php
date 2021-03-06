@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #252a37; border-radius: 25px;">
                <div class="card-header">Konsultacijos kūrimas</div>

                <div class="card-body">
                    <form method="POST" action="/konsultacijos_kurimas">
                        @csrf

                        <div class="form-group row">
                            <label for="length" class="col-md-4 col-form-label text-md-right">Konsultacijos trukmė</label>

                            <div class="col-md-6">
                                <input id="length" type="text" class="form-control" name="length" autofocus value="{{old('length')}}">
                                @error('length')
                                    <span role="alert" style="color: red;">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Konsultacijos data</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{old('date')}}">
                                @error('date')
                                    <span role="alert" style="color: red;">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-main">
                                    Kurti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection