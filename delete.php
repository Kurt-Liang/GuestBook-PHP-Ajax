<?php
session_start();
$url = "http://".$_SERVER['HTTP_HOST']."/";

if (!isset($_SESSION['userId'])) {
    header("Location: $url");
    exit;
}

$id = $_GET['id'];
$conn = mysqli_connect("localhost","root","","guestbook");
mysqli_query($conn,"DELETE FROM time_stamp where message_id = $id;");
mysqli_query($conn,"DELETE FROM comments where message_id = $id;");
mysqli_query($conn,"DELETE FROM messages where id = $id;");
$title = "Successfully deleted";
$conn->close();


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

