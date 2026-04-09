<?php
include('connection.php');

function generateCode($length = 6){
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

if(isset($_POST['long_url'])){
    $long_url = mysqli_real_escape_string($con, $_POST['long_url']);
    $code = generateCode();

    // Ensure code is unique
    $check = mysqli_query($con, "SELECT * FROM urls WHERE short_code='$code'");
    while(mysqli_num_rows($check) > 0){
        $code = generateCode();
        $check = mysqli_query($con, "SELECT * FROM urls WHERE short_code='$code'");
    }

    mysqli_query($con, "INSERT INTO urls (long_url, short_code) VALUES ('$long_url', '$code')");
    echo "Short URL: <a href='redirect.php?c=$code' target='_blank'>http://localhost/url_shortener/redirect.php?c=$code</a>";
}
?>