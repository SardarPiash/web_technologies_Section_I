<?php
session_start();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $flag = true;
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $remerber_me=sanitize($_POST['remember_me']);


        if (empty($username)) {
            $_SESSION['username_err']='<b style="color:red">*Enter Username Frist...</b>';
            $flag = false;
        }else{
            $_SESSION['username_err']="";
            $_SESSION['username']=$username;
        }
         
        
        
        if (empty($password)) {
            $_SESSION['password_err']='<b style="color:red">*Enter Password Frist...</b>';
            $flag = false;	
        }else{
            $_SESSION['password_err']="";
            $_SESSION['password']=$password;
        }
        if(isset($_POST['remember_me']) && $_POST['remember_me'] == true) {
            $cookie_name1 = "username_cookie";
            $cookie_value1 = $username;
            setcookie($cookie_name1, $cookie_value1, time() + 3600, "/");
            $cookie_name2 = "password_cookie";
            $cookie_value2 = $password;
            setcookie($cookie_name2, $cookie_value2, time() + 3600, "/");
        }
        if($flag===true)
        {
            //db


            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);
            $sql = "SELECT username,name, password FROM registration WHERE username='$username'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['username']=$row["username"];
                $_SESSION['name']=$row["name"];
                $_SESSION['password']=$row["password"];
                if($_SESSION['username']===$username && $_SESSION['password']===$password){
                    $_SESSION['login']=true;
                    $_SESSION['viewseller']=true;
                    $cookie_name2="password";
                    $cookie_value2=$_SESSION['password'];
                    setcookie($cookie_name2, $cookie_value2, time() +2, "/");
                    
                    header('location:sellerdashboard.php');
                }else{
                    $_SESSION['log_err']='<b style="color:red">*Invalid User</b>';
                    header('location:login.php');
                }
                
                }
            } else {
                header('location:login.php');
            }

            mysqli_close($con);
        }else{
            header('location:login.php');
        }
        
        
    }

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

