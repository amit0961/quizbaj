<?php
$conn = mysql_connect("localhost", "gameanim_atms", "n0@ccess4U");

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("gameanim_atms")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}
/*
id, student_id, password, full_name, father_name, mother_name, birthday, 
email, phone, gender, nid, birth_certificate, education, current_position, applicable_you, 
organization, designation, area_interest, division_id, district_id, district2_id, district3_id, 
upazila_id, address, address1, file_name, allow_traning, selection_score, certificate_score, 
interview_score, id_batch, status, user_id, creationdate, ipaddresss
*/

$sql = "SELECT * FROM exam_result GROUP BY id_student ORDER BY marks_achieved DESC";
$result = mysql_query($sql);
if (!$result) 
{
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}

while ($row = mysql_fetch_assoc($result)) 
{
    $id_student = $row["id_student"];
    $marks_achieved = $row["marks_achieved"];

   	echo $sqlUpdate = "UPDATE student_info SET selection_score = '$marks_achieved', total_score = '$marks_achieved' WHERE id = '$id_student'";
   	$resultUpdate = mysql_query($sqlUpdate);
   	echo "<br>";
}

mysql_free_result($result);

?> 