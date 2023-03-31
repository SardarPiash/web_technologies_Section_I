<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "project";
$con = mysqli_connect($servername, $uname, $pass, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }else
  {
    $stmt = $con->prepare("UPDATE registration SET name=?, email=?, phone=?, gender=?, bloodgroup=?, dob=?, address=? WHERE username=?");
    $stmt->bind_param("ssssssss", $name, $email, $phone, $gender, $bloodgroup, $dob, $address,$id);
    $name = $_SESSION['name_update'];
    $email = $_SESSION['email_update'];
    $phone = $_SESSION['phone_update'];
    $gender = $_SESSION['gender_update'];
    $bloodgroup = $_SESSION['bloodgroup_update'];
    $dob = $_SESSION['dob_update'];
    $address = $_SESSION['address_update'];
    $stmt->execute();
    $_SESSION['stmt']=$stmt;
}

?>