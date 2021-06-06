<?php
//header('Content-type: application/json');

error_reporting(0);


include 'database.php';

$inputInfomation = trim(file_get_contents('php://input'));
$inputInfomationArray = json_decode($inputInfomation,true);


$subjectList = array();


$sql ="SELECT * FROM examinations where status = 1";

$result = $conn->query($sql);

$numRows = $result->num_rows;

$i=1;

if($numRows > 0){
  
  $code = 1;
 
  while ($row = mysqli_fetch_assoc($result)) 
  {
    $subname[$i]['subject_name'] = $row['exam_name'];
    $i++;
  }
}else{
  $code = 0;
  $subname = "Subject Not Found!.";
}

$subjectList = array('code' => $code, 'message' => 'Success', 'subject' => $subname);

header("Content-type: application/json; charset=utf-8");
echo "[".json_encode($subjectList)."]";
?>