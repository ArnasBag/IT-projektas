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

        $consultations = $user->consultations->where('type', null)->where('active', true);
        $notifications = $user->notifications;

        return view('consultant', compact('consultations', 'notifications'));
    }
    public function create(){
        return view('konsultacijos_kurimas');
    }
    public function store(Request $request){

        $validated = $request->validate([
            'length' => 'required|numeric',
            'date' => 'required|date',
        ]);

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
            $consultation = Consultation::firstOrCreate([
                'user_id' => auth()->user()->id,
                'type' => 'quick',
            ]);
            $messages = $consultation->messages;
            if($notification === null && $messages->first() === null){
                foreach($users as $user){
                    $user->notify(new UserNeedsHelp(auth()->user()));
                }
            }

            return view('quick-help', compact('messages', 'consultation'));
        }
        else{
            $consultation = Consultation::where('user_id', $id)->where('type', 'quick')->first();
            DB::table('notifications')->where('data', $id)->delete();

            $messages = $consultation->messages;
            return view('quick-help', compact('messages', 'consultation'));
        }
        
    }
    public function end_consultation(Request $request){
        $user = User::find($request->id);
        $reservation = $user->reservation;

        $reservation->active = false;
        $reservation->save();
    }
    public function endHelp(Request $request){
        DB::table('messages')->where('consultation_id', $request->consultation)->delete();
        $user = auth()->user();
        $user->stars = $user->stars + 1;
        $user->save();
        DB::table('consultations')->where('id', $request->consultation)->delete();
        return redirect()->to('/consultant');
    }
    public function checkIfEnded($id){
        if(Consultation::where('id', $id)->exists()){
            return response()->json(true);
        }

        return response()->json(false);
    }
}
