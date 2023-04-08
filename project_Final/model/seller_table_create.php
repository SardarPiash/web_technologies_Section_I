<?php
    $servername = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "project";
    $con = mysqli_connect($servername, $uname, $pass, $dbname);
    $stmt = $con->prepare("INSERT INTO balance_sheet (username, total_sale, withdraw) VALUES (?, ?, ?)");
    $stmt->bind_param("sdd", $username, $total_sale, $withdraw);
    $username=$_SESSION['username'];
    $total_sale = 0;
    $withdraw = 0;
    $stmt->execute();
?>