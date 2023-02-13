<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
</head>
<body>

<table align=center><tr><td>
	<h1>Login Page</h1>
     <fieldset><legend>Login</legend>
     <table><tr><th>
	<form method="post" action="logcheck.php" novalidate>
		<label for="username">Username:</label>
		<input type="username" id="username" name="username">
</td></tr><tr><th>
		
		<label for="password">Password:</label>
		<input type="text" id="password" name="password">
</th></tr><tr align=right><td>
		
		<input type="submit" value="Login"></td></tr></table>
	</form></td></tr></table>
    <p align=center>Already have an account? Registration <a href="registration.php">here</a></p>

</body>
</html>