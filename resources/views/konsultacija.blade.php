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
            </div>
            <div class="card-footer p-3">
                <form method="POST" action="/send">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fas fa-search mr-1"></i>
                            <input class="message-input" name="content" type="text" placeholder="Įrašykite žinutę...">
                            <input type="text" name="consultation" value={{$consultation->id}} hidden>
                        </div>          
                        <button type="submit" class="btn-send">
                            <i class="fas fa-paper-plane mr-3"></i>
                        </button>
                    </div>

                </form>
                
            </div>
        </div>
    </div>
</div>



<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var messageBody = document.querySelector('.scrollable');
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;

    var oldStartTime = localStorage.getItem('startTime');
    var startTime = oldStartTime ? new Date(oldStartTime) : new Date();
    localStorage.setItem('startTime', startTime);

    var elapsed = new Date() - startTime;
    var duration = {{ $consultation->length }} * 100 - elapsed;
    console.log(duration);
    
    setTimeout(function() {
        $.ajax({
            url: '/end-consultation',
            type: 'POST',
            data: {_token: CSRF_TOKEN, id: {{auth()->user()->id}}},
            success: function () {
                localStorage.clear();
                window.location.href = "/main-test";
            },
            error: function() { 
                console.log("failure");
            }
        }); 
    }, duration);

</script>

@endsection