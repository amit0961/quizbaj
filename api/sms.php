<?php 

	$data= array(
		'auth'=>array(
			"username"=>"arena",
			"password"=>"W@5fe3435988e32",
			"acode"=>"1005002"
		),
		'smsInfo'=>array(
			"message"=>"Hello Golam Rabbi.",
			"masking"=>"EXCELLENCE",
			"msisdn"=>['8801746711907']
		),
	);
	
	$url = "http://api.vjel.com/bulksms/index.php/api/sendSMS";

	$data_string = json_encode($data);	

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                    
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	'Content-Type: application/json',                                                                                
	'Content-Length: ' . strlen($data_string))                                                                      
	);

	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$result = curl_exec($ch);
	
	$resultdata = json_decode($result);
	
	echo "<pre>";print_r($resultdata);exit;
	


?>