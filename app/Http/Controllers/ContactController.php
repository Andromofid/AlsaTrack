<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function sendContactMessage(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::raw("Nom: {$data['name']}\nEmail: {$data['email']}\n\nMessage:\n{$data['message']}", function ($msg) use ($data) {
            $msg->to('ymofid18@gmail.com')
                ->subject('📩 Nouveau message de contact');
        });

        return back()->with('success', 'Votre message a été envoyé avec succès.');
    }
}
