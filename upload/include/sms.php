<?php
function send_SMS($to_num, $msg)
{	
	$params = array(
	'username' => 'login',				//login z konta SMSAPI
	'password' => md5('********'),     	//lub $password="ci&#261;g md5"
	'to' => $to_num,		        	//recipient
	'from' => 'Medrah',					//sender
	'message' => $msg, 					//message body
	);
	if ($params['username'] && $params['password'] && $params['to'] && $params['message']) 
	{
			$data = '?'.http_build_query($params);
			$plik = fopen('https://ssl.smsapi.pl/sms.do'.$data,'r'); $wynik = fread($plik,1024);
			fclose ($plik);
			return $wynik;
	}
}
?>