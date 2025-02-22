<?php

namespace App\Traits;

trait Sms
{
    public function sendSMS($message, $mobileNo, $templated = '')
    {
        return true;

        if (is_array($mobileNo)) {
            $mobileNo = implode(',', $mobileNo);
        }

        try {

            $senderId = 'REFERR';

            // //Your authentication key
            $authKey = '145690AehLN5bcQO58d0bc4b';

            //Your message to send, Add URL encoding here.
            $message = urlencode($message);

            // //Define route
            $route = '4';

            // //Prepare you post parameters
            $postData = [
                'authkey' => $authKey,
                'mobiles' => $mobileNo,
                'message' => $message,
                'sender' => $senderId,
                'route' => $route,
                'DLT_TE_ID' => $templated,
            ];

            // //API URL
            $url = 'https://control.msg91.com/api/sendhttp.php';

            // // init the resource
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData,
                //,CURLOPT_FOLLOWLOCATION => true
            ]);

            // //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            // //get response
            $output = curl_exec($ch);
            $resp['msg'] = $output;

            // //Print error if any
            if (curl_errno($ch)) {
                echo 'error:' . curl_error($ch);
            }
            curl_close($ch);

            $resp['success'] = true;

            return $resp;
        } catch (\Exception $e) {
            //        echo $e->errorMessage(); //Pretty error messages from PHPMailer
            $resp['msg'] = 'error';
            $resp['success'] = false;
            $resp['message'] = $e->getMessage();

            return $resp;
        }
    }

    // public function sendStarOrderServiceOtp($phone,$otp)
    // {

    // }
    // public function sendCompleteOrderServiceOtp($phone,$otp)
    // {

    // }
}
