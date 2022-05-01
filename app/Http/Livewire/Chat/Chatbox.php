<?php

namespace App\Http\Livewire\Chat;

use App\Events\ChangeStatus;
use App\Events\MessageRead;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;
use SebastianBergmann\Environment\Console;

class Chatbox extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $senderInstance;
    public $messages;
    public $messages_count;
    public $paginateVar = 10;
    public $height;

    /*protected $listeners = [
        'loadConversation',
        'pushMessage',
        'loadMoreMessages',
        'updateHeight',
    ];*/

    public function getListeners()
    {
        $auth_id = auth()->user()->id;

        return [
            "echo-private:teams-chat.{$auth_id},MessageSent" => 'broadcastedMessageReceived',
            "echo-private:teams-chat.{$auth_id},MessageRead" => 'broadcastedMessageRead',
            'loadConversation',
            'pushMessage',
            'loadMoreMessages',
            'updateHeight',
            'broadcastMessageRead',
            'refresh' => '$refresh',
        ];
    }

    public function broadcastedMessageReceived($event)
    {
        $this->emitTo('chat.chat-list', 'refresh');

        $broadcastedMessage = Message::find($event['message']);

        if($this->selectedConversation)
        {
            if((int) $this->selectedConversation->id === (int)$event['conversation_id'])
            {
                $broadcastedMessage->read = 1;
                $broadcastedMessage->save();
                $this->pushMessage($broadcastedMessage->id);

                $this->emitSelf('broadcastMessageRead');
            } else {
                $this->dispatchBrowserEvent('audioNotification');
            }

            
        } else {
            $this->dispatchBrowserEvent('audioNotification');
        }
    }

    public function broadcastedMessageRead($event)
    {
        if($this->selectedConversation)
        {
            if((int) $this->selectedConversation->id == (int) $event['conversation_id'])
            {
                $this->dispatchBrowserEvent('markMessageAsRead');
            }
        }
    }

    public function broadcastMessageRead()
    {
        broadcast(new MessageRead($this->selectedConversation->id, $this->receiverInstance->id));
    }

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

            $this->emitTo('chat.send-message', 'newConversation', $this->selectedConversation, $this->receiverInstance);

            $this->messages = $this->selectedConversation->messages->toQuery()
                            ->skip($this->messages_count - $this->paginateVar)
                            ->take($this->paginateVar)
                            ->get();

            
            
            $this->dispatchBrowserEvent('chatSelected');
            $this->dispatchBrowserEvent('scrollChatBox');
    
            Message::where('conversation_id', $this->selectedConversation->id)
                        ->where('receiver_id', auth()->user()->id)
                        ->where('read', 0)
                        ->update(['read' => 1]);
    
            $this->emitSelf('broadcastMessageRead');
            $this->emitTo('chat.chat-list', 'refresh');

        } catch (\Throwable $th) {
            
            $this->messages =  $this->selectedConversation->messages;

        }

        
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
