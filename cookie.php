<?php 

// readable by javascript and other languages.

setCookie("user_theme", "dark_mode", time() + 3600, "/");

// readable only by the
setCookie("user_session", "jwt_token_1245",[

'expires' => time() + 3600,
'path' => '/',
'secure' => true, //for testing purposes, should be true in production,
'httponly' => true, // user_theme=dark_mode; user_session=jwt_token_1245 on false and on true it wil not be accessible by javascript and other languages
'sameSite' => 'lax' // for testing


]);


$theme   = $_COOKIE['user_theme'] ?? 'Light (Default)';
$session = $_COOKIE['user_session'] ?? 'No Token Received Yet (Refresh Page!)';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Cookie Security Lab</title>
</head>
<body>
    <h2>PHP Cookie Security & Inspection Lab</h2>
    
    <p>Theme Preference Cookie: <strong><?php echo htmlspecialchars($theme); ?></strong></p>
    <p>Auth Session Token: <strong><?php echo htmlspecialchars($session); ?></strong></p>

    <p><em>Note: On first load, cookies are set. Refresh the page to see the values in PHP!</em></p>

    <script>
        // Trying to read cookies from JavaScript
        console.log("JS document.cookie output:", document.cookie);
    </script>
</body>
</html>