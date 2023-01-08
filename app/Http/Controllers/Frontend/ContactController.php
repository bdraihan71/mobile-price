<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Validation Error', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        $contact = new Contact;
        $contact->name = $request->get('name');  
        $contact->email = $request->get('email');  
        $contact->phone = $request->get('phone');  
        $contact->message = $request->get('message');  
        $contact->save();

        Alert::success('Success', 'Your message has been sent successfully.');
        return back();
    }
}
