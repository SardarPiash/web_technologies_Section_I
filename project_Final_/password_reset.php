<?php
session_start();
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
     <fieldset class="tabl"><legend><h3>Reset Your Password</h3></legend>
     <table>
		<tr>
			<th>
	            <form method="post" action="password_reset_validation.php" novalidate>
				<?php
                    if(isset($_SESSION['username__err']))
                    {
                        echo $_SESSION['username__err'];
                        unset($_SESSION['username__err']);
                    }
                ?> <br>
		        <label for="username">Username:</label>
		        <input type="text" id="username" name="username" placeholder="Enter your username..">
                
            </th>
		</tr>
		<tr align="right">
			<td>
                <input type="submit" value="Reset Password" style="color:green">

			</td>
		</tr>

        <tr align="center">
            <td>
            <?php
                    if(isset($_SESSION['username_not_found']))
                    {
                        echo $_SESSION['username_not_found'];
                        unset($_SESSION['username_not_found']);
                    }
                ?>
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