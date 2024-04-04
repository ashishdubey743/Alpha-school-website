<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\contactRequest;
use App\Models\Contact;
use App\Mail\thankyou as thankyouEmail;
use Illuminate\Support\Facades\Mail;

class FunctionController extends Controller
{
    public function process_contact(contactRequest $request){
    
        $contact = Contact::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ]);
        if($contact){
            Mail::to($request->input('email'))->send(new thankyouEmail());
            return view('pages/thank-you');
        }
    }
}
