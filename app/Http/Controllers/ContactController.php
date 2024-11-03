<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Validator;
use Mail;

class ContactController extends Controller
{
    public static function index(){
        return view('frontend.pages.contact',[

        ]);
    }

    public function submitContactForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'message' => $request->message,
        ];

        $site = SiteSetting::find(1);

        Mail::to($site->email)->send(new ContactFormMail($details));

        return response()->json(['success' => 'Your message has been sent successfully!']);
    }
}
