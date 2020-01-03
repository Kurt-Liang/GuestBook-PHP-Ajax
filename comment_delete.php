<?php
session_start();
$url = "http://".$_SERVER['HTTP_HOST']."/";

if (!isset($_SESSION['userId'])) {
    header("Location: $url");
    exit;
}

$id = $_GET['id'];
$comment_id = $_GET['comment_id'];

$conn = mysqli_connect("localhost","root","","guestbook");
mysqli_query($conn,"DELETE FROM comments where id = $comment_id;");

$title = "Successfully deleted";
$conn->close();


?> 
<html>   
<head>
<meta http-equiv="refresh" content="0;url=<?php echo $url ?>article.php?id=<?php echo $id ?>">
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

