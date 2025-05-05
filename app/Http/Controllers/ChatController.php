<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function startMessages($receiver_id)
    {
        $receiver = User::findOrFail($receiver_id);
        $messages = Chat::where(function ($query) use ($receiver_id) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $receiver_id);
        })->orWhere(function ($query) use ($receiver_id) {
            $query->where('sender_id', $receiver_id)
                  ->where('receiver_id', Auth::id());
        })->with('sender', 'receiver')->orderBy('created_at')->get();
    
        return view('chat.list', compact('receiver', 'messages'));
    }
    

    public function sendMessages(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);
    
        $chat = Chat::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'messages' => $request->message
        ]);
    
        return response()->json([
            'message' => $chat->messages,
            'created_at' => $chat->created_at->format('h:i A'),
        ]);
    }
    
    public function chatWithCandidates($job_id)
{
    $job = Job::findOrFail($job_id);
    $candidates = JobApplication::where('job_id', $job_id)->with('user')->get(); // Assuming user is the applicant

    return view('chat.candidates', compact('job', 'candidates'));
}

 public function showMessage($receiver_id)
    {
        $receiver = User::findOrFail($receiver_id);
        $messages = Chat::where(function ($query) use ($receiver_id) {
                        $query->where('sender_id', auth()->id())
                              ->where('receiver_id', $receiver_id);
                    })
                    ->orWhere(function ($query) use ($receiver_id) {
                        $query->where('sender_id', $receiver_id)
                              ->where('receiver_id', auth()->id());
                    })
                    ->orderBy('created_at', 'asc')
                    ->get();

        return view('chat.list', compact('receiver', 'messages'));
    }

    public function fetchMessages($receiverId)
    {
        $messages = Chat::where(function ($query) use ($receiverId) {
            $query->where('sender_id', auth()->id())
                  ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', auth()->id());
        })->get();

        return response()->json(['messages' => $messages]);
    }
}

