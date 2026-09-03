<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Inertia\Inertia;
// use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function all_message() {
        $messages = Message::latest()->paginate(8);
        return Inertia::render('Dashboard/Messages/All', [
            'messages' => $messages
        ]);
    }

    public function store_message(StoreMessageRequest $request) {
        $validated = $request->validated();
        Message::create($validated);
        return redirect()->back()->with("success", "Votre message a été envoyer avec succès !");
    }

    public function show_message(Message $message){
        return Inertia::render('Dashboard/Messages/View', [
            'message' => $message
        ]);
    }

    public function delete_message(Message $message) {
        $message->delete();
        return redirect()->route('all.message')->with("success", "Suppression réussi !");
    }

    public function change_statut(Message $message) {
        $message->statut = $message->statut === 'lu' ? 'non lu' : 'lu';
        $message->save();
        return back();
    }
}
