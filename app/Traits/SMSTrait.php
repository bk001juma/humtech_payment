<?php

namespace App\Traits;

use GuzzleHttp\Client;

class SMSTrait
{
    public function sendBEEMSMS($phone,$sms,$id = 12,$sender_name = 'VMS')
    {
        $phone_no = $this->formatPhone($phone);
        //        return '1';
        $api_key = '382ce1c925a34ffd';
        $secret_key = 'NDY4NWQ4NjliNzM3ZGRmM2QxZjI2MWMzY2RkY2E5MDNjOTQxYTQ0Y2U0YTJmNDg5ODUyMDdhY2IzZmM2YjgxYQ==';
        // The data to send to the API
        $postData = array(
            'source_addr' => $sender_name,
            'encoding'=>0,
            'schedule_time' => '',
            'message' => $sms,
            'recipients' => [
                ['recipient_id' => $id,'dest_addr'=>trim($phone_no,'+')],
//                ['recipient_id' => 102,'dest_addr'=>'255683772862']
            ]
        );
        //.... Api url
        $Url ='https://apisms.beem.africa/v1/send';

        // Setup cURL
        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($ch, array(
            CURLOPT_HEADER => 0,
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_CONNECTTIMEOUT => 1,
            CURLOPT_DNS_CACHE_TIMEOUT => 100,
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => false,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if($response === FALSE){
            echo $response;

            die(curl_error($ch));
        }
        $response;
    }

    public function formatPhone($phone): array|string|null
    {

        $new_no = preg_replace('/\s+/', '', $phone);
        $new_no = preg_replace('/-/', '', $new_no);
        $new_no = preg_replace('/\)/', '', $new_no);
        $new_no = preg_replace('/\(/', '', $new_no);

        if (strpos($new_no, '0') == 0) {
            $new_no = preg_replace('/^0/', '+255', $new_no);
        }
        if(strpos($new_no, '255') == 0) {
            $new_no = preg_replace('/^255/', '+255', $new_no);
        }
        if(strpos($new_no, '6') == 0) {
            $new_no = preg_replace('/^6/', '+2556', $new_no);
        }
        if(strpos($new_no, '7') == 0) {
            $new_no = preg_replace('/^7/', '+2557', $new_no);
        }

        return $new_no;

    }
}
