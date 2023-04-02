<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "project";
$con = mysqli_connect($servername, $uname, $pass, $dbname);


$stmt = mysqli_prepare($con, "INSERT INTO blog(username,title,blog,photo_id) VALUES(?,?,?,?)");

mysqli_stmt_bind_param($stmt, "ssss", $_SESSION['username'], $_SESSION['blog_title'], $_SESSION['blog'], $_SESSION['new_img_name']);
mysqli_stmt_execute($stmt);
?>
