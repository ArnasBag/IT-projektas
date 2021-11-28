<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Purchase;



class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin', compact('users'));
    }
    public function store(Request $request){
        if(!empty($request->accepted)){
            foreach(array_keys($request->accepted) as $purchase_id){
                $purchase = Purchase::find($purchase_id);
                if($purchase->accepted == false){
                    $user = User::find($purchase->user_id);
                    $credits = $user->credits;
                    $credits += $purchase->credit_amount;
                    $user->credits = $credits;
                    $user->save();
                }
                $purchase->accepted = true;
                $purchase->save();
            }
        }
        else{
            foreach(array_keys($request->credits) as $user_id){
                $user = User::find($user_id);
                $user->credits = $request->credits[$user_id];
                $user->save();
            }
        }

        foreach(array_keys($request->consultants) as $user_id){
            $user = User::find($user_id);
            $user->type = $request->consultants[$user_id];
            $user->save();
        }
        // $user = User::find($purchase->user_id);
        // $user->credits = $request->credits;
        // $user->save();
        return redirect()->to('/admin');
    }
}
