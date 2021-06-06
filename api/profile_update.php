<?php
//header('Content-type: application/json');
include 'database.php';
define('PROFILE_IMG_API',   'http://quizbaj.com/api/profile_picture.php?userID=');
define('PROFILE_IMG_PATH',   'http://quizbaj.com/api/images/');
define('UPLOAD_DIR', 'images/');
$inputInfomation = trim(file_get_contents('php://input'));
$inputInfomationArray = json_decode($inputInfomation,true);
//echo "<pre>";
//echo print_r($inputInfomationArray);
//echo "</pre>";exit;
$image = $inputInfomationArray['image'];
$name = $inputInfomationArray['name'];
$age = $inputInfomationArray['age'];
$dob = $inputInfomationArray['dob'];
$secretKey = strtolower($inputInfomationArray['secretKey']);
$phoneNo = $inputInfomationArray['phone'];
$gender = $inputInfomationArray['gender'];

if(!empty($phoneNo) OR !empty($secretKey))
{
  
  $sql = "SELECT *FROM users WHERE phone_no = '$phoneNo' AND secret_key = '$secretKey' AND status = 1 LIMIT 1";
  $result = $conn->query($sql);
  $numRows = $result->num_rows;
 
  
  if($numRows == 1)
  {
      if(empty($image))
      {  
          $sqlUpdate = "UPDATE users SET full_name = '$name', birth_date = '$dob', gender = '$gender' 
                      WHERE phone_no = '$phoneNo' AND secret_key = '$secretKey'";
      }                
      else
      {  
          $img = str_replace('data:image/png;base64,', '', $image);
          $img = str_replace(' ', '+', $img);
          $dataImages = base64_decode($img);
          $fileName = uniqid().'.png';
          $filePath = UPLOAD_DIR.$fileName;
          $success = file_put_contents($filePath, $dataImages);

          $sqlUpdate = "UPDATE users SET full_name = '".$name."', birth_date = '$dob', gender = '$gender', pp_file_name = '$fileName' 
                        WHERE phone_no = '$phoneNo' AND secret_key = '$secretKey'";
      }  
      
      
       
      
      //echo $sqlUpdate;
      
      ///echo "<pre>rs";print_r($sqlUpdate);
      
      $conn-> set_charset("utf8");
      $resultUpdate = $conn->query($sqlUpdate); 
      
      ////echo "<pre>rs";print_r($resultUpdate);exit();
      
      //echo mysql_error();
      if($sqlUpdate)
      {
          $sqlProfile = "SELECT *FROM users WHERE phone_no = '$phoneNo' AND secret_key = '$secretKey' AND status = 1 LIMIT 1";
          $resultProfile = $conn->query($sqlProfile);
          
          //$result->fetch_assoc()//mysql_fetch_assoc($resultProfile)
          
          while ($row = $resultProfile->fetch_assoc()) 
          {
              $userID = $row['id'];
              $secretKey = $row['secret_key'];
              $fullName = $row['full_name'];
              $phoneNo = $row['phone_no'];
              $age = $row['age'];
              $gender = $row['gender'];
              $birthDate = $row['birth_date'];
              $pp_file_name = $row['pp_file_name'];
              if(empty($pp_file_name))
              $pp_file_name ="male.png";

              $images = $row['images'];
              //$imagesUrl = $row['pp_file_name'];
              //$pp_file_name = $row['images_url'];
              $source = $row['source'];
              $verifyCode = $row['verify_code'];
              $signupDate = $row['signup_date'];
              $userInfo = array('userID' => $userID,
                                  'secretKey' => $secretKey,
                                  'fullName' => $fullName,
                                  'phoneNo' => $phoneNo,
                                  'age' => $age,
                                  'birthDate' => $birthDate,
                                  'images' => PROFILE_IMG_PATH.$pp_file_name,
                                  'imagesUrl' => PROFILE_IMG_PATH.$pp_file_name,
                                  'source' => $source,
                                  'signupDate' => $signupDate);
              $resultCode = array('code' => "1", 'message' => 'Update Success');
          }
      }  
  }
  else
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
                    'signupDate' => "" ); 
      $resultCode = array('code' => "-2", 'message' => 'Unauthorized Access');  
  }

}
else
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
                    'signupDate' => "" ); 
    $resultCode = array('code' => "-1", 'message' => 'Invalid phone no & Key');  
}


$profileDetails = array('userInfo' => $userInfo, 'resultCode' => $resultCode); 

//echo "<pre>";
//echo print_r($loginDetails);
//echo "</pre>";

header("Content-type: application/json; charset=utf-8");
echo "[".json_encode($profileDetails)."]";

?>