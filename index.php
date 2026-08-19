<!-- Headers; -->

<?php

header("X-POWERED-BY: My-Custom-Environment-V1");
header("X--FRAME-OPTIONS: DENY");

header("Content-Type; application/json; charset=UTF-8");

header('Cache-Control: no-cache, no-store, must-revalidate');

$clientBroswer = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

$data = [

"status" => "success",
"message" => "Welcome to My-Custom-Environment-V1",
"detected_browser" => $clientBroswer

];



echo json_encode($data);

?>


