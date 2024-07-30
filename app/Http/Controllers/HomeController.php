<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Package;

class HomeController extends Controller
{
    public function packageShow()
    {
        $packages = Package::with('category')->get();
        return view('home', compact('packages'));
    }

    public function contactFormShow(){
        return view('contact');
    }
    // -----
    public function contactForm(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string|max:20',
            'message' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return redirect()->route('contact')->with('message', 'Message sent successfully');
    }



}
