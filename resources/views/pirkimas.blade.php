@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #252a37; border-radius: 25px;">
                <div class="card-header">Kreditų pirkimas</div>

                <div class="card-body">
                    <form method="POST" action="/credits/purchase">
                        @csrf


                        <div class="form-group row">
                            <label for="credit_amount" class="col-md-4 col-form-label text-md-right">Kreditų skaičius</label>

                            <div class="col-md-6">
                                <input id="credit_amount" type="number" class="form-control" name="credit_amount">
                                @error('credit_amount')
                                    <span role="alert" style="color: red;">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-main">
                                    Pirkti
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
