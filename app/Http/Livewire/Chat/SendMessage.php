<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SendMessage extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $createdMessage;

    protected $listeners = [
        'newConversation',
        'dispatchMessageSent'
    ];

    public function render()
    {
        return view('livewire.chat.send-message');
    }

    public function newConversation(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }

    public function sendMessage()
    {
        if($this->body == null)
        {
            return null;
        }

        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id'       => auth()->user()->id,
            'receiver_id'     => $this->receiverInstance->id,
            'body'            => $this->body,
        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();

        $this->emitTo('chat.chatbox', 'pushMessage', $this->createdMessage->id);
        $this->emitTo('chat.chat-list', 'refresh');
        $this->body = null;

        $this->emitSelf('dispatchMessageSent');
    }

    public function dispatchMessageSent()
    {
        broadcast(new MessageSent(auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
    }

}
