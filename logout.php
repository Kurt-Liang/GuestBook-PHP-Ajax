<?php
session_start();

$url = "http://".$_SERVER['HTTP_HOST']."/";

if (!isset($_SESSION['userId'])) {
    header("Location: $url");
    exit;
}

if (isset($_SESSION['userName'])) {
    $user_name = $_SESSION['userName'];
    $title = "See you next time, $user_name";
    unset($_SESSION['userName']);
    unset($_SESSION['userId']);
} else {
    $title = "Currently signed out";
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
    echo "<div id='title'>$title</div>
        <div id='index'>The page will jump after 3 seconds</div>";
?>
</body>
</html>

