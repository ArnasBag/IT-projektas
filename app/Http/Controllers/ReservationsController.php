<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Consultation;



class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = User::find(auth()->user()->id);
        $reservation = $user->reservation;
        return view('main', compact('reservation'));
    }
    public function create(){

        $users = User::where('type', 'consultant')->get();

        $users_filtered = array();
        $flag = false;

        foreach($users as $user){
            foreach($user->consultations as $consultation){
                if($consultation->reserved == 0){

                    $flag = true;
                }
            }
            if($flag){
                $users_filtered[] = $user;
            }
            $flag = false;
        }

        return view('rezervacijos_kurimas', compact('users_filtered'));
    }

    public function fill_dates($id){
        
        $user = User::where('id', $id)->first();

        $consultations = $user->consultations->where('reserved', 0);

        return response()->json($consultations);
    }

    public function store(Request $request){
        $reservation = Reservation::create([
            'reservation_date' => now(),
            'problem_description' => $request->problem_description,
            'user_id' => auth()->user()->id,
            'consultation_id' => $request->consultation_id,
        ]);

        $consultation = Consultation::where('id', $request->consultation_id)->first();
        $consultation->reserved = 1;
        $consultation->save();
        return redirect()->to('/main');
    }
}