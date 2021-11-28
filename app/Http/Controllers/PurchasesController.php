<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function store(Request $request){

        $validated = $request->validate([
            'credit_amount' => 'required',
        ]);

        $purchase = Purchase::create([
            'credit_amount' => $request->credit_amount,
            'accepted' => false,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->to('/main');
    }
}
