<!DOCTYPE html>
<html>
<head>
    <title>PHP URL Shortener</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>URL Shortener</h2>
        <form method="POST" action="shorten.php">
            <input type="text" name="long_url" placeholder="Enter long URL" required>
            <button type="submit">Shorten</button>
        </form>
        <?php
        if(isset($_GET['short'])){
            $shortUrl = $_GET['short'];
            echo '<div class="result">Short URL: <a href="'.$shortUrl.'" target="_blank">'.$shortUrl.'</a></div>';
        }
        ?>
    </div>
</body>
</html>