<?php
$apiKey = '3455b6272547020f1088283dfb96b567-us3';
$listId = '8617a50053';
$double_optin=false;
$send_welcome=true;
$email_type = 'html';
$email = $_POST['email'];
//replace us2 with your actual datacenter
//http://us2.api.mailchimp.com 
$submit_url = "http://us3.api.mailchimp.com/1.3/?method=listSubscribe";
//$submit_url = "http://introapp.us3.list-manage.com/subscribe/";
$data = array(
'email_address'=>$email,
'apikey'=>$apiKey,
'id' => $listId,
'double_optin' => $double_optin,
'send_welcome' => $send_welcome,
'email_type' => $email_type
);
$payload = json_encode($data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $submit_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
$result = curl_exec($ch);
curl_close ($ch);
$data = json_decode($result);
if ($data->error){
echo $data->error;
} else {
echo "Got it, you've been added to our email list.";
}