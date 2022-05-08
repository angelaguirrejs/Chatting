<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{

    public $friends;
    public $email;

    public function mount()
    {
        $this->friends = [];
    }

    public function checkConversation($receiverId)
    {
        $existingConversation = Conversation::where('receiver_id', auth()->user()->id)
                                            ->where('sender_id', $receiverId)
                                            ->orWhere('receiver_id', $receiverId)
                                            ->where('sender_id', auth()->user()->id)
                                            ->first();

        if(!$existingConversation)
        {
            $createdConversation = Conversation::create([
                'receiver_id' => $receiverId,
                'sender_id'  => auth()->user()->id,
            ]);

            return redirect()->route('chat', $createdConversation->id);

        } 
        
        return redirect()->route('chat', $existingConversation->id);
                                            
    }

    public function render()
    {
        if(!is_null($this->email))
        {
            $this->friends = User::where('id', '!=', auth()->user()->id)
                                ->where('email', 'LIKE', '%' . $this->email .'%')
                                ->whereHas('roles', function($q){
                                    $q->where('name', 'simple');
                                })->get();
        }

        return view('livewire.chat.create-chat')
                ->layout('layouts.guest');
    }
}
