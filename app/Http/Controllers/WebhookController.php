<?php

namespace App\Http\Controllers;

use App\Models\webhookModel;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function webhook(Request $request){
        $webhook_secret=env('paymongo_secret');
        $webhook_signature=$request->header('Paymongo_Signature');
        $event_datas= $request->getContent();//the event that you received
        $event_filter= json_decode($event_datas, true);//decode the event that you received so you can use it in foreach later


        //split header_signature response into 2 parts the response from header is 
        $webhook_signature_raw= preg_split("/,/",$webhook_signature);
        $webhook_signature_raw_time= preg_split("/=/",$webhook_signature_raw[0]);
        $webhook_signature_raw_data=preg_split("/=/",$webhook_signature_raw[1]);
    
        //fnnal result
        $webhook_signature_time= $webhook_signature_raw_time[1];
        $webhook_signature_data=$webhook_signature_raw_data[1];

        //concatinate the time that we get from webhook_signature response 
        $webhook_time_with_json_data = $webhook_signature_time. '.' .$event_datas;

        $computedSignature= hash_hmac('sha256', $webhook_time_with_json_data, $webhook_secret);

        //comparre the te=xxxxx value with $computedSignature if same        
        $mySignature= hash_equals($computedSignature,$webhook_signature_data);


        if($mySignature ==1 || $mySignature == true){
            foreach($event_filter as $datas){
                webhookModel::insert([
                    'payload'=>$datas['attributes']['type'], //this will output the type of the event ex: payment paid
                ]);//if you want to insert all the webhook event into your database you can put $ request->getContent()
            }
        }else{
            webhookModel::insert([
                'payload'=>'invalid',
            ]);
        }
    }
}
