<?php

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




?>