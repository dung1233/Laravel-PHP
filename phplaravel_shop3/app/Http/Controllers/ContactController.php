<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
        ]);

        Mail::send('emailcontact', [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message']
        ], function($mail) use ($validatedData) {
            $mail->to('your-email@example.com')
                 ->subject('New Contact Message');
        });
}
}
