<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sendSmsController extends Controller
{
    public function send()
    {
        define('BRAND_NAME', 'RacingMania');
        $basic  = new \Vonage\Client\Credentials\Basic("0410f541", "y5PS4zOevomGwqei");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("351933107871", BRAND_NAME, 'A text message sent using the Nexmo SMS API')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
