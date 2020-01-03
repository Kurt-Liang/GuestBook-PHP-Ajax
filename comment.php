<?php
session_start();
header('Content-Type: application/json; charset=UTF-8'); //設定資料類型為 json，編碼 utf-8
if ($_SERVER['REQUEST_METHOD'] == "POST") { //如果是 POST 請求
    @$text = $_POST["text"]; //取得 text POST 值
    @$id = $_POST["id"];
    if ($text != null) {
        date_default_timezone_set("Asia/Taipei");
        $t=time();
        $time = (date("Y-m-d H:i",$t));

        $user_name = $_SESSION['userName'];
        $user_id = $_SESSION['userId'];

        $conn = mysqli_connect("localhost","root","","guestbook");
        $sql = "INSERT INTO comments (user_name, comment, time, user_id, message_id)
                VALUES ('$user_name', '$text', '$time', '$user_id', '$id');";
        $conn->query($sql);
        $conn->close();

        echo json_encode(array(
            'user' => $user_name,
            'time' => $time,
            'text' => $text
        ));
    } else {
        //回傳 errorMsg json 資料
        echo json_encode(array(
            'errorMsg' => 'Please enter text'
        ));
    }
} else {
    //回傳 errorMsg json 資料
    echo json_encode(array(
        'errorMsg' => '請求無效，只允許 POST 方式訪問！'
    ));
}
?>