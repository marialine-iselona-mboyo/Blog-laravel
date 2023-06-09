<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::all();
        return view('emails.show-messages', compact('messages'));
    }

        public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('emails.show-messages', compact('message'));
    }
}
