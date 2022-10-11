<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    //

    public function __construct()
    {
        
    }

    public function twilioWebHook(Request $request){

        
        
 
        $response = Http::post("https://twilio.roycehub.com/conversations/user1234u/trigger_intent?output_channel=latest", [
            'name' => $request->name,
            'entities'=> [
                'lead_name'=>$request->lead_name,
                'client_name'=>$request->client_name,
                'client_number'=>$request->client_number,
                'beneficiary'=>$request->beneficiary,
                
            ]
        ]);
        Log::info($request->all());
        Log::info($request->name);
        // Log::info($response);
    }
}
