<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Reservation;

use Illuminate\Http\Request;
use App\Models\Consultation;


class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $consultation = Consultation::where('id', $id)->first();

        $messages = array();
        if(!($consultation === null)){
            $messages = $consultation->messages;
        }
        return view('konsultacija', compact('messages', 'id', 'consultation'));
    }
    public function sendMessage(Request $request){
        $user = auth()->user();
        if(!($request->content === null)){
            $message = Message::create([
                'content' => $request->content,
                'creation_date' => now(),
                'user_id' => auth()->user()->id,
                'consultation_id' =>$request->consultation,
            ]);
        }
        return back();
    }
    public function test(){

        $user = auth()->user();
        

        $reservation = Reservation::where('user_id', $user->id)->where('active', true)->first();
        $reservation->active = false;
        $consultation = Consultation::where('id', $reservation->consultation_id)->where('active', true)->first();
        $consultation->active = false;
        $user->credits = $user->credits - $consultation->length;

        $user->save();
        $reservation->save();
        $consultation->save();
        return redirect()->to('/main');
    }

}
