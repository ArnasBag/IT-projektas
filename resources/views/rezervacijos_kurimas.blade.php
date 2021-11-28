@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #252a37; border-radius: 25px;">
                <div class="card-header">Rezervacijos kūrimas</div>

                <div class="card-body">
                    <form method="POST" action="/reservation/create">
                        @csrf

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Konsultantas</label>
                            <div class="col-md-6">
                                <select id="selectBox" class="form-control">
                                    <option value="" disabled selected>Select your option</option>

                                    @foreach($users_filtered as $user)
                                    
                                        <option value='{{ $user->id }}'>{{ $user->name}}</option>
                                    @endforeach
                                </select>
                                @error('consultation_id')
                                    <span role="alert" style="color: red;">
                                        <strong>Būtina pasirinkti konsultantą</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="consultation_id" class="col-md-4 col-form-label text-md-right">Konsultacijos data</label>

                            <div class="col-md-6">
                                <select id="dateSelect" class="form-control" name="consultation_id">
                                </select>
                                @error('consultation_id')
                                    <span role="alert" style="color: red;">
                                        <strong>Būtina įvesti konsultacijos datą</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="problem_description" class="col-md-4 col-form-label text-md-right">Problemos aprašymas</label>

                            <div class="col-md-6">
                                <input id="problem_description" type="text" class="form-control" name="problem_description">

                            </div>
                        </div>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="form-group row ml-5" style="color: red;">
                                    <h6 class="">Jūsų kreditų skaičius per mažas šios konsultacijos rezervavimui</h6>
                                </div>
                            @endforeach
                        @endif
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

<script>
   $('#selectBox').change(function() {
        $('#dateSelect')
        .find('option')
        .remove();
        let id = $(this).val();
        let url = "{{ url('/fill_dates') }}" + "/" + id;

        $.ajax({
           url: url,
           type: 'get',
           dataType: 'json',
           success: function(response) {
               if (response != null) {
                    for(var key in response){
                        console.log(response[key].id);
                        console.log(response[key].date);
                        $('#dateSelect').append($('<option value="' + response[key].id + '">' + response[key].date + '</option>')); 
                    }
               }
           }
       });
   });
</script>

@endsection