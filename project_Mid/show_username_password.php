<?php
session_start();
if(!isset($_SESSION['not_show']) || $_SESSION['not_show'] == false)
{
    header('location:password_reset.php');
    exit;
}
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
</head>
<style>
    body{
        background-color:#C4E8C2;
    }
    .color{
        color:red;
    }
    .tabl {
  border-collapse: collapse;
  border: 2.5px solid green;
  width: 300px;
  height: 200px;
}
a{
    color:black;
}

</style>
<body align="center">

  <h1 align="center">Password Reset</h1><br>
  <hr color="red" size="5">

<table align="center">
	<tr>
		<td>
     <fieldset class="tabl"><legend><h3>Your account details</h3></legend>
     <table>
		<tr>
			<th>
	            <?php echo "<b>Username: </b>".$_SESSION['username_']; ?>
            </th>
		</tr>
		<tr>
			<td>
            <?php echo "<b>Password: </b>".$_SESSION['password_']; ?>
			</td>
		</tr>
	</table>
</form></fieldset></td></tr></table>
    <p align="center"><a href="login.php">Go to Log In</a></p>
    <p align="center">Already have an account? Registration <a href="registration.php">here</a></p>
    <br><br> 
    <?php
         include 'footer.php';
    ?>
</body>
</html>