<?php


namespace App\Notifications\Channels;


use App\Notifications\ActiveCodeNotification;
use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Illuminate\Notifications\Notification;

class GhasedakChannels
{
public function send($notifiable,Notification $notification){
    $data=$notification->ToGhasedakSms($notifiable);
    $message=$data['text'];
    $apiKey=config('services.ghasedak.key');
    try
    {
        $lineNumber = "10008566";
        $receptor = "09197916524";
        $api = new \Ghasedak\GhasedakApi($apiKey);
        $api->SendSimple($receptor,$message,$lineNumber);
    }
    catch(ApiException | HttpException $e){
        throw $e;
    }
}
}
