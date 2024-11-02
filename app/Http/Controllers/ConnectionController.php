<?php

namespace App\Http\Controllers;

use App\Models\ConnectionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConnectionController extends Controller
{
    public function sendRequest(Request $request)
    {

        if (Auth::user()->plans->plan_id == 1) {
            return response()->json(['success' => false, 'message' => 'Please Buy Credit to send connect request'], 409);
        }
        // Validation
        $validator = Validator::make($request->all(), [
            'recipient_id' => 'required|exists:users,id|not_in:' . Auth::id(),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check if request already exists
        $existingRequest = ConnectionRequest::where('sender_id', Auth::id())
            ->where('recipient_id', $request->recipient_id)
            ->where('status', 1)
            ->first();

        if ($existingRequest) {
            return response()->json(['message' => 'Request already sent']);
        }else{
             // Save new request
            ConnectionRequest::create([
                'sender_id' => Auth::id(),
                'recipient_id' => $request->recipient_id,
                'status' => 1,
            ]);
        }

        return response()->json(['message' => 'Request sent successfully']);
    }

    public function acceptRequest(Request $request, $id)
    {
        // Find and update the request's status to 'accepted' (status = 2)
        $connectionRequest = ConnectionRequest::where('id', $id)
            ->where('recipient_id', Auth::id())
            ->first();

        if (!$connectionRequest) {
            return response()->json(['message' => 'Request not found'], 404);
        }

        $connectionRequest->update(['status' => 2]);
        return response()->json(['message' => 'Request accepted successfully']);
    }

    public function cancelRequest(Request $request, $id)
    {
        // Find and delete the request
        $connectionRequest = ConnectionRequest::where('id', $id)
            ->first();

        if (!$connectionRequest) {
            return response()->json(['message' => 'Request not found'], 404);
        }

        $connectionRequest->delete();
        return response()->json(['message' => 'Request canceled successfully']);
    }
}
