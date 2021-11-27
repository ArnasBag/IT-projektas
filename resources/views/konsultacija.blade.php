@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="w-75 ">
        <div class="card" style="background-color: #252a37; border-radius: 25px;">
            <div class="card-header">
                <h4 class="card-title">Konsultacija</h4>
            </div>
            <div class="d-flex flex-column p-5 scrollable">
                @foreach($messages as $message)
                <!-- <div class="d-flex">
                    <img class="avatar" src="{{ asset('assets/profile.png') }}" alt="">
                    <div class="chat-message">
                        <p>Labas!</p>
                    </div>     
                </div> -->
                    @if($message->user_id == auth()->user()->id)
                        <div class="d-flex flex-row-reverse padding-no-avatar">
                            <div class="chat-message2">
                                <p>{{ $message->content}}</p>
                            </div>     
                        </div>
                    @else
                        <div class="d-flex padding-no-avatar">
                            <div class="chat-message">
                                <p>{{ $message->content}}</p>
                            </div>     
                        </div>
                    @endif
                @endforeach

                <!-- <div class="d-flex flex-row-reverse">
                    <div class="chat-message2">
                        <p>Labas!</p>
                    </div>     
                </div>
                <div class="d-flex flex-row-reverse padding-no-avatar">
                    <div class="chat-message2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>     
                </div>
                <div class="d-flex flex-row-reverse padding-no-avatar">
                    <div class="chat-message2">
                        <p>Sed commodo arcu non ligula aliquam molestie.</p>
                    </div>     
                </div>

                <div class="d-flex">
                    <img class="avatar" src="{{ asset('assets/profile.png') }}" alt="">
                    <div class="chat-message">
                        <p>Labas!</p>
                    </div>     
                </div>
                <div class="d-flex padding-no-avatar mb-5">
                    <div class="chat-message">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo arcu non ligula aliquam molestie.</p>
                    </div>     
                </div> -->
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
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    setTimeout(function() {
        $.ajax({
            url: '/end-consultation',
            type: 'POST',
            data: {_token: CSRF_TOKEN, id: {{auth()->user()->id}}},
            success: function () {
                window.location.href = "/main";
            },
            error: function() { 
                console.log("failure");
            }
        }); 
    }, 5000);

</script>

@endsection