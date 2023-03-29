<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username=$_POST['username_buyer'];
    $text=$_POST['text'];
    $_SESSION['buyer_username']=$username;
    $flag=true;
    if(empty($username))
    {
        $flag=false;    
    }else{
        $_SESSION['username_err']="";
    }
    if(empty($text))
    {
        $flag=false;    
    }else{
        $_SESSION['username_err']="";
       
    }
    if($flag===true){
        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "project";
        $con = mysqli_connect($servername, $uname, $pass, $dbname);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
          }else
          {
            $sql = "INSERT INTO chat (username, text)
            VALUES ('$username','$text')";
            $result=mysqli_query($con, $sql);
            if($result){
                header("location:customer_communication.php");
            }else{
                echo mysqli_error($con); 
                header("location:buyer_chat.php");
            }
          }
        }else{
            header("location:buyer_chat.php");
        }



}




?>