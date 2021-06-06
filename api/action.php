<?php
set_time_limit (3600000);
include (dirname(__FILE__)."/quizbuzz.php");
$inputString = trim(file_get_contents('php://input'));
$quiz = new QuizBuzz();

$quizInfo = $quiz->actionController($inputString);

//echo "<pre>";
//echo print_r($quizInfo);
//echo "</pre>";
header("Content-type: application/json; charset=utf-8");
//echo print_r($quizInfo);

echo "[".json_encode($quizInfo)."]";

//echo json_encode($quizInfo, JSON_FORCE_OBJECT);
?>