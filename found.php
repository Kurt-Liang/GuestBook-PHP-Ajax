<?php
$url = "http://".$_SERVER['HTTP_HOST']."/";
?>
<html>   
<head>   
<meta http-equiv="refresh" content="3;url=<?php echo $url ?>">
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
    echo "<div id='title'>No articles found</div>
        <div id='index'>The page will jump after 3 seconds</div>";
?>
</body>
</html>