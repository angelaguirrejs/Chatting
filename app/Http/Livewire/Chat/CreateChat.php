<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{

    public $friends;

    public $message;

    public function checkConversation($receiverId)
    {
        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)
                                            ->where('sender_id', $receiverId)
                                            ->orWhere('receiver_id', $receiverId)
                                            ->where('sender_id', auth()->user()->id)
                                            ->get();

        if($checkedConversation->isEmpty())
        {
            $createdConversation = Conversation::create([
                'receiver_id' => $receiverId,
                'sender_id'  => auth()->user()->id,
            ]);
        }
        else
        {
            dd('Existe');
        }
                                            
    }

    public function render()
    {
        $this->friends = User::where('id', '!=', auth()->user()->id)->get();

        return view('livewire.chat.create-chat')
                ->layout('layouts.guest');
    }
}
