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
<style>
    body{
        background-color:#C4E8C2;
    }
    .color{
        color:red;
    }
    fieldset {
        width: 400px;
        height: 600px;
        border-collapse: collapse;
        border: 2.5px solid green; 
    }
a{
    color:black;
}

</style>

    <body align="center">

  <h1 align="center">Registration Here</h1>
  <hr color="red" size="5">
   <table align="center">
    <tr>
        <th>
        <form method="post" action="registration_check.php" novalidate>
        <fieldset>
            <legend><h3>Registration</h3></legend>  
            <table align="center">
            <tr>
        <th align="left">
    
            <?php
                 if(isset($_SESSION['username_err']))
                 {
                    echo $_SESSION['username_err'];
                    unset($_SESSION['username_err']);
                 }
            ?><br>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username']:"" ?>" placeholder="Enter your Username..">
            <?php unset($_SESSION['username']); ?><br>
        </th>
    </tr>
    <tr>
        <th align="left">
        <?php
                 if(isset($_SESSION['password_err']))
                 {
                    echo $_SESSION['password_err'];
                    unset($_SESSION['password_err']);
                 }
            ?><br>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password']:"" ?>" placeholder="Enter Password.."> 
            <?php unset($_SESSION['password']); ?><br>
        </th>
    </tr>
    <tr>
        <th align="left">
        <?php
                 if(isset($_SESSION['status_err']))
                 {
                    echo $_SESSION['status_err'];
                    unset($_SESSION['status_err']);
                 }
            ?><br>
             <label for="status">Status: </label>
            <input type="radio" id="status" name="status" value="teacher">Teacher
            <input type="radio" id="status" name="status" value="student">Student
            <br>
        </th>
    </tr>
    <tr>
        <th>
        <table align="center">
            <tr>
                <td>
                    <input type="submit" value="Registration" ><br>
                </td>
            </tr>
        </table>
        </th>
    </tr>
  </table></form></fieldset></th></tr>
            </table> 
            <p align="center">Already have an account? Login <a href="login.php">here</a></p>  
</body>
</html>