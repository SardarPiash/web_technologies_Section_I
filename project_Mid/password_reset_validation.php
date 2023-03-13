<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag=true;
    $username=sanitize($_POST['username']);

    if (empty($username)) {
        $_SESSION['username__err']='<b style="color:red">*Enter Username Frist...</b>';
        $flag = false;
    }else{
        $_SESSION['username__err']="";
        $_SESSION['username_']=$username;
    }
    if($flag===true)
        {
            //db


            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);
            $sql = "SELECT username, password FROM registration WHERE username='$username'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['username_']=$row["username"];
                $_SESSION['password_']=$row["password"];
                $_SESSION['not_show']=true;
                header('location:show_username_password.php');
                }
            } else {
                $_SESSION['username_not_found']='<b style="color:red">*User Not found.</b>';
                header('location:password_reset.php');
            }

            mysqli_close($con);
        }else{
            header('location:password_reset.php');
        }

}
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>