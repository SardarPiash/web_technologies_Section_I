<?php
session_start();
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

  <h1 align="center">Log In</h1><br>
  <hr color="red" size="5">

<table align="center">
	<tr>
		<td>
     <fieldset class="tabl"><legend><h3>Log In</h3></legend>
     <table>
		<tr>
			<th>
	            <form method="post" action="logcheck.php" novalidate>
				<?php
                    if(isset($_SESSION['username_err']))
                    {
                        echo $_SESSION['username_err'];
                        unset($_SESSION['username_err']);
                    }
                ?> <br>
		        <label for="username">Username:</label>
		        <input type="text" id="username" name="username" placeholder="Enter your username..">
                
            </th>
		</tr>
		<tr>
			<th>
			<?php
                    if(isset($_SESSION['password_err']))
                    {
                        echo $_SESSION['password_err'];
                        unset($_SESSION['password_err']);
                    }
                ?> <br>
		        <label for="password">Password:</label>
		        <input type="password" id="password" name="password"   placeholder="Enter your password..">
            </th>
		</tr>
		<tr align="right">
			<td>
                <input type="submit" value="Login">

			</td>
		</tr>

        <tr align="center">
            <td>
            <?php
                    if(isset($_SESSION['log_err']))
                    {
                        echo $_SESSION['log_err'];
                        unset($_SESSION['log_err']);
                    }
                ?>
            </td>
        </tr>
	</table>
</form></fieldset></td></tr></table>
    <!-- <p align="center">Password forgotten?reset <a href="password_reset.php">here</a></p> -->
    <p align="center">Haven't any account? Registration <a href="registration.php">here</a></p>
    <br><br>
</body>
</html>