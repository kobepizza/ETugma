<?php

namespace App\Events;

use App\Models\Chat;
use App\Models\Guardian;
use App\Models\GuardianMain;
use App\Models\UserProfile;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class SendParentMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;
    public $receiverId;
    public $senderId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Chat $chat,$receiverId,$senderId)
    {
        $this->chat = $chat;
        $this->receiverId = $receiverId;
        $this->senderId = $senderId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        return new Channel("tutor-{$this->receiverId}-parent-{$this->senderId}-chat");
    }

    /**
     * Prepare the data to be broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        $sender = UserProfile::find($this->senderId);
        $receiver = UserProfile::find($this->receiverId);

        if ($sender && $receiver) {
            return [
                'message' => $this->chat->message,
                'receiver_id' => $this->receiverId,
                'sender_id' => $this->senderId,
                'parent' => [
                    'id' => $sender->id,
                    'fname' => $sender->fname,
                    'lname' => $sender->lname,
                    'image' => asset('Images/' . $sender->profile_pic),
                ],
                'created_at' => $this->chat->created_at,
            ];
        };
    }

    /**
     * The name of the event to broadcast.
     *
     * @return string
     */
    public function broadcastAs()
    {
         return 'tutor-parent-chat';
    }
}
