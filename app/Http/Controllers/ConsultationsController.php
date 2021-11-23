<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\User;



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

        $consultations = $user->consultations;

        return view('consultant', compact('consultations'));
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
}
