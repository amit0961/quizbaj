<?php
//header('Content-type: application/json');
include 'database.php';
define('PROFILE_IMG_PATH',   'http://api.vjel.com/quiz/images/');

$pp = "male.png";
$userID = $_GET['userID'];
$sql = "SELECT *FROM  users WHERE id = '$userID' LIMIT 1";
$result = mysql_query($sql);
$numRows = mysql_num_rows($result);
if($numRows > 0)
{
    while ($row = mysql_fetch_assoc($result)) 
    {
        $pp = $row['pp_file_name'];
        if(empty($pp))
        $pp = "male.png";
    }
}

echo PROFILE_IMG_PATH.$pp;

?>