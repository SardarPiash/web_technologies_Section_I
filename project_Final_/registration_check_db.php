<?php

function insert_registration_info(){
    $servername = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "project";
    $con = mysqli_connect($servername, $uname, $pass, $dbname);
    $stmt = $con->prepare("INSERT INTO registration (name, username, password, email, phone, gender, bloodgroup, dob, type, address)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $name, $username, $password, $email, $phone, $gender, $bloodgroup, $dob, $status, $address);

    $name = $_SESSION['name'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $gender = $_SESSION['gender'];
    $bloodgroup = $_SESSION['bloodgroup'];
    $dob = $_SESSION['dob'];
    $status = $_SESSION['status'];
    $address = $_SESSION['address'];

    $stmt->execute();
}
function insert_data_in_balancesheet(){
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
    }



?>