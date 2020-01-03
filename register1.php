<?php
session_start();

$url = "http://".$_SERVER['HTTP_HOST']."/";

if (!isset($_SESSION['userId'])) {
    header("Location: $url");
    exit;
}

if (empty($_POST['userName']) or empty($_POST['userPwd'])) {
    $title = "Please enter name, password and enail";
    $uri = $url."register.php";
} else {
    $user_name = $_POST['userName'];
    $user_pwd = sha1($_POST['userPwd']);
    $user_email = $_POST['userEmail'];

    $conn = mysqli_connect("localhost","root","","guestbook");
    $result = mysqli_query($conn,"SELECT * FROM users where user_name='$user_name';");

    if ($result->num_rows > 0) {
        $title = "$user_name is already used";
        $uri = $url."register.php";

    } else {
        $sql = "INSERT INTO users (user_name, user_pwd, user_email)
            VALUES ('$user_name', '$user_pwd', '$user_email')";
        $conn->query($sql);

        $title = "$user_name created successfully";
        $uri = $url."login.php";
    }

    
    $conn->close();
}


?> 
<html>   
<head>   
<meta http-equiv="refresh" content="0;url=<?php echo $uri ?>">
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

