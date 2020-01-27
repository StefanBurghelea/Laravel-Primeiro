<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail; //usar o gerador d email
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; //usar o gerador de emails

class ContactFormController extends Controller
{
    public function create(){
        return view('contact.create'); //criar um email e mandar
    }

    public function store(){

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to('test@test.com')->send(new ContactFormMail($data)); //receber o mail para test@test.com e enviar a data 

        return redirect('contact') //quando é evinado enviar um alert
            ->with('message', 'Thanks for your message. We\'ll be in touch.');
        
    }
}
