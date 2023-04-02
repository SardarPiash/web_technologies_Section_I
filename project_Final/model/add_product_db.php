
<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "project";

$con = mysqli_connect($servername, $uname, $pass, $dbname);

$stmt = $con->prepare("INSERT INTO newproduct(username,name,price,details,photo_id) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssss",$_SESSION['username'],$_SESSION['productname'],$_SESSION['productprice'],$_SESSION['productdetails'],$_SESSION['new_img_name']);
$stmt->execute();

?>