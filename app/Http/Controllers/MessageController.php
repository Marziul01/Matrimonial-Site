<?php

namespace App\Http\Controllers;

use App\Models\LiveSupportMessage;
use App\Models\Profile;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function userchatsupport(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'marital_status' => 'required|string|in:single,Divorced,Widowed,Awaiting Divorce',
        ];

        // Run the validator
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            // Return validation errors in JSON format with a 422 status code
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // // Check if a profile exists matching the provided information
        //     $profileExists = Profile::where('contact_number', $request->input('number'))
        //     ->where('marital_status', $request->input('marital_status'))
        //     ->where('date_of_birth', $request->input('date_of_birth'))
        //     ->exists();

        // // If no profile exists, return an error response
        // if (!$profileExists) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'No profile found with the provided information.',
        //     ], 404);
        // }

        // If validation passes, save the data to the database
        $supportMessage = new LiveSupportMessage();
        $supportMessage->name = $request->input('name');
        $supportMessage->email = $request->input('email');
        $supportMessage->message = $request->input('message');
        $supportMessage->number = $request->input('number');
        $supportMessage->date_of_birth = $request->input('date_of_birth');
        $supportMessage->marital_status = $request->input('marital_status');
        $supportMessage->seen = 0;
        $supportMessage->save();

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => "Hello, {$supportMessage->name}. Your message has been sent to our Support Center. We will get back to you shortly.",
        ]);
    }
}
