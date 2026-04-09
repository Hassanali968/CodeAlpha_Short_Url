<?php
include('connection.php');

if(isset($_GET['c'])){
    $code = $_GET['c'];

    // Fetch long URL from DB
    $res = mysqli_query($con, "SELECT long_url FROM urls WHERE short_code='$code'");
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        $longUrl = $row['long_url'];

        // Make sure long URL has http:// or https://
        if(!preg_match("~^(?:f|ht)tps?://~i", $longUrl)){
            $longUrl = "http://" . $longUrl;
        }

        header("Location: $longUrl");
        exit();
    } else {
        echo "URL not found!";
    }
} else {
    echo "Invalid request!";
}
?>