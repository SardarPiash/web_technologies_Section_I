<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $text=$_POST['text'];
    $username=$_SESSION['username'];
    $flag1=true;
    if(empty($text))
    {
        $_SESSION['text_err']='<b style="color:red">*Enter Text Frist...</b>';
        $flag1=false;    
    }else{
        $_SESSION['text_err']="";
       
    }
    if($flag1===true){
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
                header("location:customer_communication.php");
            }
          }
        }else{
            header("location:customer_communication.php");
        }



}




?>