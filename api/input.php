<?php
// For Submit Exam
/*
$inputArray = array('userID' => 1, 
	'phoneNo' => '8801714101351', 
	'secretKey' => 'c4ca4238a0b923820dcc509a6f75849b', 
	'examID'=> 1, 
	'examLogID' => 1,
	'sheetID' => 1,
	'answer' =>1,
	'isCorect' => 1,
	'isComplete' => 0,
	'action' => 'exam-submit');
*/	
// For Exam Sheet
/*	
$inputArray = array('userID' => 1, 
	'phoneNo' => '8801714101351', 
	'secretKey' => 'c4ca4238a0b923820dcc509a6f75849b', 
	'examID'=> 1,
	'round' => 1,
	'action' => 'exam-sheet');
*/	

// For Exam Common Rules
/*	
$inputArray = array('userID' => 1, 
	'phoneNo' => '8801714101351', 
	'secretKey' => 'c4ca4238a0b923820dcc509a6f75849b',
	'action' => 'common-rules');
*/
// For Post Help
$inputArray = array('userID' => 1, 
	'phoneNo' => '8801714101351', 
	'secretKey' => 'c4ca4238a0b923820dcc509a6f75849b',
	'email' => 'EMAIL ADDRESS',
	'message' => 'MESSAGE',
	'action' => 'help-post');



$inputArray = array('userID' => 19, 
	'phoneNo' => '8800121456445', 
	'secretKey' => '1f0e3dad99908345f7439f8ffabdffc4', 
	'examLogID'=> 25,
	'action' => 'resent-exam-result');

$inputArray = array('userID' => 1, 
	'phoneNo' => '8801714101351', 
	'secretKey' => 'c4ca4238a0b923820dcc509a6f75849b', 
	'action' => 'profile-picture');

// For leader-board
$inputArray = array('userID' => 1, 
	'phoneNo' => '8801714101351', 
	'secretKey' => 'c4ca4238a0b923820dcc509a6f75849b',
	'action' => 'leader-board');

// For leader-board
$inputArray = array('userID' => 1, 
	'phoneNo' => '8801714101351', 
	'secretKey' => 'c4ca4238a0b923820dcc509a6f75849b',
	'action' => 'leader-board-altime');

echo json_encode($inputArray);

?>