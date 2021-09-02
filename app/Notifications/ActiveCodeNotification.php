<?php

namespace App\Notifications;

use App\Notifications\Channels\GhasedakChannels;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActiveCodeNotification extends Notification
{
    use Queueable;
    public int $code;
    public string $phone_number;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code,$phone_number)
    {
        $this->code=$code;
        $this->phone_number=$phone_number;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GhasedakChannels::class];
    }
    public function ToGhasedakSms($notifiable){
        return[
            'text'=>"کد احراز هویت $this->code \n وبسایت tcidea",
            'phone_number'=>$this->phone_number,
        ];
    }
}
