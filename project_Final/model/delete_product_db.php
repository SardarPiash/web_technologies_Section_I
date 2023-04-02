<?php
$id = $_SESSION['delete_product_id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$con = mysqli_connect($servername, $username, $password, $dbname);

$stmt = mysqli_prepare($con, "DELETE FROM newproduct WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

mysqli_close($con);
?>
