<?php
session_start();

ini_set('memory_limit','2G');
ini_set('display_errors', 0);

$url = "http://".$_SERVER['HTTP_HOST']."/";

if (!isset($_SESSION['userId'])) {
    header("Location: $url");
    exit;
}

date_default_timezone_set("Asia/Taipei");
$t=time();
$time = (date("Y-m-d H:i",$t));

if (empty($_POST['message']) or empty($_POST['title'])) {
    $page_title = "Please enter message";
} else {
    $conn = mysqli_connect("localhost","root","","guestbook");

    $message = $_POST['message'];
    $title = $_POST['title'];
    $user_name = $_SESSION['userName'];
    $user_id = $_SESSION['userId'];
    $video_mp4 = "";

    if (!empty($_POST['video_mp4'])) {
        $video_mp4 = $_POST['video_mp4'];

        $http = substr($video_mp4, 0, 7);
        $https = substr($video_mp4, 0, 8);
        $end =  substr($video_mp4, -4);

        if ($http == "http://" or $https == "https://" and $end == ".mp4") {
            $html = file_get_contents($video_mp4);
            if (empty($html)) {
                $page_title = "Please enter the correct URL";
            } else {
                $sql = "INSERT INTO messages (user_name, message, time, title, user_id, video_mp4)
                    VALUES ('$user_name', '$message', '$time', '$title', '$user_id', '$video_mp4');";

                $conn->query($sql);

                $page_title = "Created successfully";
            }

        } else {
            $page_title = "Please enter the correct URL";
        }

    } else {
        $sql = "INSERT INTO messages (user_name, message, time, title, user_id)
                VALUES ('$user_name', '$message', '$time', '$title', '$user_id');";

        $conn->query($sql);

        $page_title = "Created successfully";

    }

    $conn->close();
}


?> 
<html>   
<head>   
<meta http-equiv="refresh" content="0;url=<?php echo $url ?>">
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
    echo "<div id='title'>$page_title</div>
        <div id='index'>The page will jump after 3 seconds</div>";
?>
</body>
</html>

