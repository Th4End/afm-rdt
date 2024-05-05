<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth; // Ajout de l'import pour la classe Auth

class MessageController extends Controller
{
    // Affiche le formulaire d'envoi de message
    public function create()
    {
        // Récupérer les messages si l'utilisateur est connecté
        return view('message');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);

        Message::create($request->all());

        return redirect()->back()->with('success', 'Message envoyé avec succès !');
    }
}
