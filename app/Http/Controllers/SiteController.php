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

        $hash = hash('crc32', $request->customData['client_number'], FALSE);

        // return $hash;


        
        
 
        $response = Http::post("https://twilio.roycehub.com/conversations/$hash/trigger_intent?output_channel=latest", [
        // $response = Http::post("http://localhost:5005/conversations/user1234u/trigger_intent?output_channel=latest", [
            "name" => "EXTERNAL_crm_form",
            'entities'=> [
                // 'lead_name'=>"josphat",
                // 'client_name'=>"client",
                // 'client_number'=>"(801) 406-7958",
                // 'beneficiary'=>"Jane",
                'lead_name'=>$request->customData['lead_name'],
                'client_name'=>$request->customData['client_name'],
                'client_number'=>$request->customData['client_number'],
                'beneficiary'=>$request->customData['beneficiary'],
                
            ]
        ]);
        Log::info($request->all());
        Log::info($request->customData['name']);
        Log::info($response);
    }
}
// https://twilio-ui.roycehub.com