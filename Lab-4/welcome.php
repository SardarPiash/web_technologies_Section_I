<?php
session_start();
if(!isset($_SESSION['status'])){
    if(!$_SESSION['status'])
    {
        header ('location:login.php');
    }
}

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
    <table align="center">
        <tr>
            <th>Welcome</th>
        </tr>
        <tr>
            <td>Successful</td>
        </tr>
    </table>
</body>
</html>