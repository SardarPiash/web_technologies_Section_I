<?php
    
    $servername = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "project";
    $con = mysqli_connect($servername, $uname, $pass, $dbname);
    $stmt =$con->prepare("SELECT name,username,email,phone,gender,bloodgroup,dob,type,address FROM registration WHERE username=?");
    $username=$_SESSION['username'];
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($name,$username,$email,$phone,$gender,$bloodgroup,$dob,$status,$address);
        while($stmt->fetch()) {
        $_SESSION['name']=$name;
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        $_SESSION['phone']=$phone;
        $_SESSION['gender']=$gender;
        $_SESSION['bloodgroup']=$bloodgroup;
        $_SESSION['dob']=$dob;
        $_SESSION['status']=$status;
        $_SESSION['address']=$address;
        }
        $stmt->close();
    }


?>