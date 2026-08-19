<?php

declare(strict_types=1);

$emailInput = $_GET['email'] ?? "user@gmail.com";
$ageInput   = $_GET['age'] ?? "25";
$queryInput = $_GET['search_query'] ?? "<script>alert('xss attack!')</script>";

$email = filter_var($emailInput, FILTER_VALIDATE_EMAIL);
$age   = filter_var($ageInput, FILTER_VALIDATE_INT);

if ($email === false) {
    echo "Invalid email address.<br>";
} else {
    echo "Valid email: $email<br>";
}

if ($age === false) {
    echo "Invalid age.<br>";
} else {
    echo "Valid age: $age<br>";
}

// 2. Sanitization for Web Output
$safeQuery = htmlspecialchars($queryInput, ENT_QUOTES, 'UTF-8');

echo "<br>Raw Input Execution Blocked!<br>";
echo "Sanitized Output for Web: " . $safeQuery . "<br>";