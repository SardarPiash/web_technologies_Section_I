<?php
$id = $_SESSION['reject_id'];
$status = "Rejected";
$decision = "Operation_done";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$con = mysqli_connect($servername, $username, $password, $dbname);

$stmt = mysqli_prepare($con, "UPDATE ordermanage SET status = ?, order_decision = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "ssi", $status, $decision, $id);
mysqli_stmt_execute($stmt);

mysqli_close($con);
?>
