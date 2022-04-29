<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use SebastianBergmann\Environment\Console;

class Chatbox extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $messages;
    public $messages_count;
    public $paginateVar = 10;
    public $height;

    protected $listeners = [
        'loadConversation',
        'pushMessage',
        'loadMoreMessages',
        'updateHeight',
    ];

    public function render()
    {
        return view('livewire.chat.chatbox');
    }

    public function loadConversation(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;

        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        try {

            $this->messages = $this->selectedConversation->messages->toQuery()
                            ->skip($this->messages_count - $this->paginateVar)
                            ->take($this->paginateVar)
                            ->get();

        } catch (\Throwable $th) {
            
            $this->messages = [];

        }

        $this->dispatchBrowserEvent('chatSelected');
        $this->dispatchBrowserEvent('scrollChatBox');
        $this->emitTo('chat.send-message', 'newConversation', $this->selectedConversation, $this->receiverInstance);
    }

    public function pushMessage($messageId)
    {
        $newMessage = Message::find($messageId);

        $this->messages->push($newMessage);

        $this->dispatchBrowserEvent('scrollChatBox');
    }

    public function loadMoreMessages()
    {
        $this->paginateVar += 10;
        
        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        try {

            $qty_messages = count($this->messages);

            $this->messages = $this->selectedConversation->messages->toQuery()
                            ->skip($this->messages_count - $this->paginateVar)
                            ->take($this->paginateVar)
                            ->get();

            if(count($this->messages) > $qty_messages)
            {
                $height = $this->height;
                $this->dispatchBrowserEvent('updatedHeight', ($height));
            }

        } catch (\Throwable $th) {
            

        }

    }

    public function updateHeight($height)
    {
        $this->height = $height;
    }
}
