<?php

namespace App\Notifications;

use App\Lib\MsgContect;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Msg extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $msg ;
    public function __construct(MsgContect $msg)
    {
     $this->msg=$msg ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'phone'=>$this->msg->phone,
            'name'=>$this->msg->name ,
            'email'=>$this->msg->email ,
            'content'=>$this->msg->content ,

            //
        ];
    }
}
