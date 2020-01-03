<?php
session_start();

$url = "http://".$_SERVER['HTTP_HOST']."/";

if (!isset($_SESSION['userId'])) {
    header("Location: ".$url."found.php");
    exit;
}

if (empty($_POST['text'])) {
    $title = "Please enter text";
} else {
    $min = $_POST['min'];
    $sec = $_POST['sec'];
    if (!empty($min) or !empty($sec)) {
        $time = $min * 60 + $sec;
    }


    $text = $_POST['text'];
    $user_id = $_SESSION['userId'];
    $message_id = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","guestbook");

    $http = substr($text, 0, 7);
    $https = substr($text, 0, 8);



    if ($http == "http://" or $https == "https://") {

        $sql = "INSERT INTO time_stamp (time, image, user_id, message_id)
                VALUES ('$time', '$text', '$user_id', '$message_id');";
    } else {

        $sql = "INSERT INTO time_stamp (time, text, user_id, message_id)
                VALUES ('$time', '$text', '$user_id', '$message_id');";
    }

    $conn->query($sql);

    $title = "Comment successfully";

    $conn->close();
}


?> 
<html>   
<head>   
<meta http-equiv="refresh" content="0;url=<?php echo $url ?>article.php?id=<?php echo $message_id ?>">
<style>
#title {
    font-size: 40px;
    text-align: center;
    margin-top: 60px;
}
#index {
    font-size: 25px;
    text-align: center;
    margin-top: 60px;
}
</style>
</head>
<body>
<?php
    echo "<div id='title'>$title</div>
        <div id='index'>The page will jump after 3 seconds</div>";
?>
</body>
</html>





