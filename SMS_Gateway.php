<?php
/*
// Step: go to controller:

public function applicationStatusUpdate(Request $request, $id)
{
    $consultancyInfo = StudentConsultancyInfo::find($id);

    // sms start
    $text = "Congratulations ".'Your Application status has been pending';
    $sms = rawurldecode($text);
    $this->smsGateWay($sms, $consultancyInfo->mobile_number);
    
}

// Next Method-same controller:

function smsGateWay($text, $mobile_number)
{
    $url = "http://bulksmsbd.net/api/smsapi";
    $api_key = "{your api key}";
    $senderid = "{your sender id}";
    $number = "88016xxxxxxxx,88019xxxxxxxx";
    $message = "test sms check";
    
    $data = [
        "api_key" => $api_key,
        "senderid" => $senderid,
        "number" => $number,
        "message" => $message
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
    
}

*/