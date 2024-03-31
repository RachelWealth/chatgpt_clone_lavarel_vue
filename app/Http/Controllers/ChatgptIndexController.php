<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ChatgptIndexController extends Controller
{
    public function __invoke(string $id=null):Response
    {
        //dd(  1? Chat::findOrFail($id):null);
         $chat=Chat::findOrFail($id);
        return Inertia::render('Chat/ChatIndex',[
            'chat'=>$chat,
            'messages'=>Chat::latest()->where('user_id',Auth::id())->get(),  
        ]);
    }
}
