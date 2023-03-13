<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    
    if (!isset($_POST['gender'])) {
        $_POST['gender'] = "";
        
    }
    if (!isset($_POST['status'])) {
        $_POST['status'] = "";
        
    }
    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
    $flag=true;
    $name=sanitize($_POST['name']);
    $username=sanitize($_POST['username']);
    $password=sanitize($_POST['password']);
    $email=sanitize($_POST['email']);
    $phone=sanitize($_POST['phone']);
    $gender=sanitize($_POST['gender']);
    $dob=sanitize($_POST['dob']);
    $bloodgroup=sanitize($_POST['bloodgroup']);
    $status=sanitize($_POST['status']);
    $address=sanitize($_POST['address']);

    if(empty($name))
    {
        $_SESSION['name_err']="*Enter your name please.";
        $flag=false;    
    }else{
        $_SESSION['name_err']="";
        $_SESSION['name']=$name;
    }
    if(empty($username))
    {
        $_SESSION['username_err']="*Enter your username please.";
        $flag=false;    
    }else{
        $_SESSION['username_err']="";
        $_SESSION['username']=$username;
    }
    if(empty($password))
    {
        $_SESSION['password_err']="*Enter your password please.<b>";
        $flag=false;
    }else{
        $_SESSION['password_err']="";
        $_SESSION['password']=$password;
    }
    if(empty($email))
    {
        $_SESSION['email_err']="*Enter your email please.<b>";
        $flag=false;
    }else{
        $_SESSION['email_err']="";
        $_SESSION['email']=$email;
    }
    if(empty($phone))
    {
        $_SESSION['phone_err']="*Enter your phone number please.<b>";
        $flag=false;
    }else{
        $_SESSION['phone_err']="";
        $_SESSION['phone']=$phone;
    }
    if(empty($gender))
    {
        $_SESSION['gender_err']="*Enter your gender please.<b>";
        $flag=false;
    }else{
        $_SESSION['gender_err']="";
        $_SESSION['gender']=$gender;
    }
    if(empty($bloodgroup))
    {
        $_SESSION['bloodgroup_err']="*Enter your blood group please.<b>";
        $flag=false;
    }else{
        $_SESSION['bloodgroup_err']="";
        $_SESSION['bloodgroup']=$bloodgroup;
    }
    if($bloodgroup=="None")
    {
        $_SESSION['bloodgroup_err']="*Enter your blood group please.<b>";
        $flag=false;
    }else{
        $_SESSION['bloodgroup_err']="";
        $_SESSION['bloodgroup']=$bloodgroup;
    }
    if(empty($dob))
    {
        $_SESSION['dob_err']="Enter your date of birth please.<b>";
        $flag=false;
    }else{
        $_SESSION['dob_err']="";
        $_SESSION['dob']=$dob;
    }
    if(empty($status))
    {
        $_SESSION['status_err']="*Enter your status please.<b>";
        $flag=false;
    }else{
        $_SESSION['status_err']="";
        $_SESSION['status']=$status;
    }
    if(empty($address))
    {
        $_SESSION['address_err']="*Enter your address please.<b>";
        $flag=false;
    }else{
        $_SESSION['address_err']="";
        $_SESSION['address']=$address;
    }
    if($flag){
        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "project";
        $con = mysqli_connect($servername, $uname, $pass, $dbname);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
          }else
          {
            $sql = "INSERT INTO registration (name,username, password,email,phone,gender,bloodgroup,dob,type,address)
            VALUES ('$name','$username','$password','$email','$phone','$gender','$bloodgroup','$dob','$status','$address')";
            $result=mysqli_query($con, $sql);
            if (!$result) {
                if (mysqli_errno($con) == 1062) {
                  $_SESSION['user_err']="*Username Already Exists<b>";
                  header('location:registration.php');
                }
              } else {
                header('location:login.php');
              }
         }
    }else{
        header('location:registration.php');
    }
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    
</body>
</html>