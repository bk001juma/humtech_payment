<?php

namespace App\Traits;

class SMSTrait
{
    public function sendBEEMSMS($phone, $sms, $id = 12, $sender_name = null)
    {
        $phone_no = $this->formatPhone($phone);

        $api_key = (string) config('services.beem.api_key');
        $secret_key = (string) config('services.beem.secret_key');
        $url = (string) config('services.beem.url', 'https://apisms.beem.africa/v1/send');
        $sender_name = $sender_name ?: (string) config('services.beem.sender_name', 'VMS');
        $timeout = (int) config('services.beem.timeout', 15);

        if (!$api_key || !$secret_key || !$url || !$sender_name) {
            throw new \RuntimeException('BEEM SMS configuration is incomplete.');
        }

        $postData = [
            'source_addr' => $sender_name,
            'encoding' => 0,
            'schedule_time' => '',
            'message' => $sms,
            'recipients' => [
                ['recipient_id' => $id, 'dest_addr' => trim($phone_no, '+')],
            ],
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, [
            CURLOPT_HEADER => 0,
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_CONNECTTIMEOUT => $timeout,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_DNS_CACHE_TIMEOUT => 100,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json',
            ],
            CURLOPT_POSTFIELDS => json_encode($postData),
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);

            throw new \RuntimeException('BEEM SMS request failed: ' . $error);
        }

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($statusCode >= 400) {
            throw new \RuntimeException('BEEM SMS request failed with HTTP ' . $statusCode . ': ' . $response);
        }

        return $response;
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
