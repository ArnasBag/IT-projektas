<?php

namespace App\Http\Controllers;

use App\Models\Message;
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
        $consultation = Consultation::where('id', $id)->where('type', null)->first();
        $messages = array();
        if(!($consultation === null)){
            $messages = $consultation->messages;
        }
        return view('konsultacija', compact('messages'));
    }
}
