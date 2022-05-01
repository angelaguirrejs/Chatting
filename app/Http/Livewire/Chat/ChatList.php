<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;

class ChatList extends Component
{
    public $conversations;
    public $selectedConversation;

    protected $listeners = [
        'chatUserSelected',
        'refresh' => '$refresh'
    ];

    public function mount()
    {
        $this->conversations = Conversation::where('sender_id', auth()->id())
                                            ->orWhere('receiver_id', auth()->id())
                                            ->orderBy('last_time_message', 'DESC')
                                            ->get();
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }

    public function getChatUserInstance(Conversation $conversation)
    {
        $receiverInstance = null;

        if($conversation->sender_id == auth()->id())
        {
            $receiverInstance = User::find($conversation->receiver_id);
        }
        else 
        {
            $receiverInstance = User::find($conversation->sender_id);
        }

        return $receiverInstance;
    }

    public function chatUserSelected(Conversation $conversation, $receiverId)
    {
        $this->selectedConversation = $conversation;
        $receiverInstance = User::find($receiverId);


        $this->emitTo('chat.chatbox', 'loadConversation', $this->selectedConversation, $receiverInstance);
    }

    
}
