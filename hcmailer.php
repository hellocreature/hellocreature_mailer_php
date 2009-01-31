<?
// Account Settings
$hellocreature_email = "your_email@domain.ocm";
$hellocreature_api_key = "b9adsfadfafsfdadfaf";
	

function deliver_hellocreature_mail($email, $api_key, $message){
         $message = urlencode($message);
         $url = "http://hellocreature.com/messages";	
         $ch = curl_init();

         curl_setopt($ch, CURLOPT_URL,$url);

         curl_setopt($ch,CURLOPT_USERPWD,$email . ":" . $api_key);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS,"message={$message}");

         $result= curl_exec ($ch);
         curl_close ($ch);
         return $result;
}


function hellocreature_mail($to, $subject, $body, $headers='', $options=''){
         global $hellocreature_email;
         global $hellocreature_api_key;

         $message = '';
         $message .=   "to: {$to}\n";
         $message .=   $headers . "\n";
         $message .=   "subject: {$subject}\n\n";
         $message .=  $body;

         deliver_hellocreature_mail($hellocreature_email, $hellocreature_api_key, $message);
}


?>
