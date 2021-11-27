<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\UserNeedsHelp;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\DB;


class ConsultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);

        $consultations = $user->consultations->where('type', null);
        $notifications = $user->notifications;

        return view('consultant', compact('consultations', 'notifications'));
    }
    public function create(){
        return view('konsultacijos_kurimas');
    }
    public function store(Request $request){
        Consultation::create([
            'length' => $request->length,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
            'reserved' => 0,
        ]);
        return redirect()->to('/consultant');
    }
    public function quick_help($id){
        $users = User::where('type', 'consultant')->get();

        if(auth()->user()->type === null){
            $notification = DB::table('notifications')->where('data', auth()->user()->id)->first();
            if($notification === null){
                foreach($users as $user){
                    $user->notify(new UserNeedsHelp(auth()->user()));
                }
            }
            $consultation = Consultation::firstOrCreate([
                'user_id' => auth()->user()->id,
                'type' => 'quick',
            ]);
        }
        elseif(auth()->user()->type == 'consultant'){
            $test = DB::table('notifications')->where('data', $id)->delete();
        }
        $consultation = Consultation::where('user_id', $id)->where('type', 'quick')->first();
        $messages = $consultation->messages;

        return view('konsultacija', compact('messages'));
    }
    public function end_consultation(Request $request){
        $user = User::find($request->id);
        $reservation = $user->reservation;

        $reservation->active = false;
        $reservation->save();
    }

}
