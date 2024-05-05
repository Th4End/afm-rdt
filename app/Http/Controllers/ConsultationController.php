<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ConsultationController extends Controller
{
    public function index()
    {
        // Vérifier si l'utilisateur est connecté et administrateur
        if (Auth::check() && Auth::user()->verifAdmin()) {
            // Récupérer tous les messages depuis la base de données
            $messages = Message::all();
    
            // Vérifier si des messages ont été récupérés
            if ($messages->isEmpty()) {
                // Aucun message trouvé
                // Vous pouvez afficher un message d'erreur ou rediriger
                return redirect()->back()->withErrors('Aucun message trouvé.');
            }
    
            // Passer les messages à la vue et l'afficher
            return view('consulter', compact('messages'));
        } else {
            // Rediriger l'utilisateur ou afficher un message d'erreur
            abort(403, 'vous devez être administrateur');
        }
    }
    
    
}

