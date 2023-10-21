<?php

namespace App\Http\Services\Message\SMS;

use Illuminate\Support\Facades\Config;

class FarazSmsService
{
    private $username;
    private $password;
    private $otp_from;

    public function __construct()
    {
        $this->username = Config::get('sms.username');
        $this->password = Config::get('sms.password');
        $this->otp_from = Config::get('sms.otp_from');
    }

    public function SendSmsPatern($from, array $to, $text, $isFlash = true)
    {
        $username = $this->username;
        $password = $this->password;
        $from = $from;
        $pattern_code = "txmjc2sgd2mtxvu";
        $to = $to;
        $input_data = array("code" => $text);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
    }

    public function SendSms($from, array $to, $text, $isFlash = true)
    {
        $url = "https://ippanel.com/services.jspd";

        $rcpt_nm = array($to);
        $param = array(
            'uname' => $this->username,
            'pass' => $this->password,
            'from' => $from,
            'message' => $text,
            'to' => $to,
            'op' => 'send'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);


        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];
    }


    public function NewUser()
    {
        $url = "https://ippanel.com/services.jspd";

        $param = array(
            'uname' => '',
            'pass' => '',
            'user_uname' => '',
            'user_pass' => '',
            'name' => '',
            'company' => '',
            'national_id' => '',
            'certificate_id' => '',
            'access_id' => '',
            'tell' => '',
            'mobile' => '',
            'postalcode' => '',
            'email' => '',
            'address' => '',
            'op' => 'newuser'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];


        echo $res_data;
    }

    public function GetCredit()
    {
        $url = "https://ippanel.com/services.jspd";
        $param = array(
            'uname' => '',
            'pass' => '',
            'op' => 'credit'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];


        echo $res_data;
    }


    public function GetIndex()
    {
        $url = "https://ippanel.com/services.jspd";
        $param = array(
            'uname' => '',
            'pass' => '',
            'op' => 'inboxlist'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];


        echo $res_data;
    }
}
