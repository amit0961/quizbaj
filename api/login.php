<?php
//header('Content-type: application/json');

error_reporting(0);


include 'database.php';

//require_once('database.php');


define('PROFILE_IMG_PATH',   'http://quizbaj.com//api/images/');
$smsAPI = "http://api.vjel.com/bulksms/index.php/api/sendSMS";
$inputInfomation = trim(file_get_contents('php://input'));
$inputInfomationArray = json_decode($inputInfomation,true);

$phoneNo = $inputInfomationArray['phoneNo'];
if(empty($phoneNo))
$phoneNo = "NO_INPUT";

$ansCode = substr($phoneNo, 0, 5);


$tid = uniqid();


///echo 'mobile<<<<<<'. $phoneNo;exit;

//$phoneNo = "8801714101353";
$loginDetails = array();
if($phoneNo == "NO_INPUT")
{

    $userInfo = array('userID'=> "",
                    'secretKey' => "",
                    'fullName' => "",
                    'phoneNo' => $phoneNo,
                    'age' => "",
                    'birthDate' => "",
                    'images' => "",
                    'imagesUrl' => "",
                    'source' => "",
                    'verifyCode' => "",
                    'signupDate' => "" ); 
    $resultCode = array('code' => -1, 'message' => 'Invalid Phone Number'); 
}
else
{

    $sql = "SELECT *FROM users WHERE phone_no = '$phoneNo' AND status = 1 LIMIT 1";
    $result = $conn->query($sql);
    $numRows = $result->num_rows;
    if($numRows == 1)
    {
       /// while ($row = mysql_fetch_assoc($result))
        while ($row = $result->fetch_assoc())
        {
            $userID = $row['id'];
            $secretKey = $row['secret_key'];
            $fullName = $row['full_name'];
            $phoneNo = $row['phone_no'];
            $age = $row['age'];
            $gender = $row['gender'];
            $birthDate = $row['birth_date'];
            $images = $row['images'];
            $imagesUrl = $row['images_url'];
            $pp_file_name = $row['pp_file_name'];
            if(empty($pp_file_name))
            $pp_file_name ="male.png";
              
            $pp = PROFILE_IMG_PATH.$pp_file_name;
            $source = $row['source'];
            $verifyCode = $row['verify_code'];
            $signupDate = $row['signup_date'];
            $userInfo = array('userID' => $userID,
                              'secretKey' => $secretKey,
                              'fullName' => $fullName,
                              'phoneNo' => $phoneNo,
                              'age' => $age,
                              'birthDate' => $birthDate,
                              'images' => $pp,
                              'imagesUrl' => $pp,
                              'source' => $source,
                              'verifyCode' => MD5($verifyCode),
                              'signupDate' => $signupDate);
            $resultCode = array('code' => 1, 'message' => 'Existing user');
            

            if($ansCode)
            {

                
                ///$url = $smsAPI;
               
                /*$dataPost = array(
                        'tid' => $tid,
                        'sms' => "Your Verification Code: ".$verifyCode,
                        'receiver' => $phoneNo);
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
                $output = curl_exec($ch);
                $info = curl_getinfo($ch);
                curl_close($ch);*/
                
                $data= array(
            		'auth'=>array(
            			"username"=>"arena",
            			"password"=>"W@5fe3435988e32",
            			"acode"=>"1005002"
            		),
            		'smsInfo'=>array(
            			"message"=>"Your Verification Code: ".$verifyCode,
            			"masking"=>"EXCELLENCE",
            			"msisdn"=>[$phoneNo]
            		),
            	);
            	
            	$url = $smsAPI;
            
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
            
            	 curl_exec($ch);
                
                
            }

        }   
    }
    else
    {
            $sqlInsert = "INSERT INTO users (phone_no, status) VALUES ('$phoneNo', 1)";
            $resultInsert = $conn->query($sqlInsert);
            $insertID =  $conn->insert_id;
            if($insertID)
            {
                $secretKey = MD5($insertID);
                $verifyCode = rand(100000,999999);
                $signupDate = date('Y-m-d H:i:s');
                $sqlUpate = "UPDATE users SET secret_key = '$secretKey', verify_code = '$verifyCode', signup_date = '$signupDate' WHERE id = '$insertID'";
                $resultUpdate = $conn->query($sqlUpate);
                
                $userInfo = array('userID' => $insertID,
                              'secretKey' => $secretKey,
                              'fullName' => "",
                              'phoneNo' => $phoneNo,
                              'age' => "",
                              'birthDate' => "",
                              'images' => "",
                              'imagesUrl' => "",
                              'source' => "",
                              'verifyCode' => MD5($verifyCode),
                              'signupDate' => "");
                $resultCode = array('code' => 2, 'message' => 'New user'); 
                if($ansCode)
                {
                     /*$url = $smsAPI;
               
                    $dataPost = array(
                            'tid' => $tid,
                            'sms' => "Your Verification Code: ".$verifyCode,
                            'receiver' => $phoneNo);
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
                    $output = curl_exec($ch);
                    $info = curl_getinfo($ch);
                    curl_close($ch);*/
                    
                    $data= array(
                		'auth'=>array(
                			"username"=>"arena",
                			"password"=>"W@5fe3435988e32",
                			"acode"=>"1005002"
                		),
                		'smsInfo'=>array(
                			"message"=>"Your Verification Code: ".$verifyCode,
                			"masking"=>"EXCELLENCE",
                			"msisdn"=>[$phoneNo]
                		),
                	);
                	
                	$url = $smsAPI;
                
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
                
                	 curl_exec($ch);
                    
                    
                }                
            }
            else
            {
                $userInfo = array('userID' => "",
                              'secretKey' => "",
                              'fullName' => "",
                              'phoneNo' => $phoneNo,
                              'age' => "",
                              'birthDate' => "",
                              'images' => "",
                              'imagesUrl' => "",
                              'source' => "",
                              'verifyCode' => "",
                              'signupDate' => "");
                $resultCode = array('code' => 0, 'message' => 'Enternal Error');                 
            }
    }
}

$loginDetails = array('userInfo' => $userInfo, 'resultCode' => $resultCode); 

//echo "<pre>";
//echo print_r($loginDetails);
//echo "</pre>";
header("Content-type: application/json; charset=utf-8");
echo "[".json_encode($loginDetails)."]";
?>