<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChatgptIndexController extends Controller
{
    public function __invoke(string $id=null):Response
    {
        return Inertia::render('Chat/ChatIndex');
    }
}
