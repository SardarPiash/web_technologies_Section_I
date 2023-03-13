<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table align=center><tr><td>
	<h1>Login Page</h1>
     <fieldset><legend>Login</legend>
     <table><tr><th>
	<form method="post" action="check.php" novalidate>
		<label for="current">Current Password:</label>
		<input type="password" id="current" name="current">
        <?php
                 if(isset($_GET['err']))
                 {
                    if($_GET['err']=='cur')
                    {
                        echo "<br> <b>Enter Current Password.</b> <br>";
                    }
                 }
            ?>
</td></tr><tr><th>
		
		<label for="new">New Password:</label>
		<input type="password" id="new" name="new">
        <?php
                 if(isset($_GET['err']))
                 {
                    if($_GET['err']=='new')
                    {
                        echo "<br> <b>Enter New Password.</b> <br>";
                    }
                 }
            ?>
        
</th></tr><tr><th>
        <label for="confirm">Confirm Password:</label>
		<input type="password" id="confirm" name="confirm">
        <?php
                 if(isset($_GET['err']))
                 {
                    if($_GET['err']=='con')
                    {
                        echo "<br> <b>Enter Confirm Password. </b> <br>";
                    }
                 }
            ?>
            <?php
                 if(isset($_GET['err']))
                 {
                    if($_GET['err']=='same')
                    {
                        echo "<br> <b>Current and New Password same.</b> <br>";
                    }
                 }
            ?>
            <?php
                 if(isset($_GET['err']))
                 {
                    if($_GET['err']=='samee')
                    {
                        echo "<br> <b>New and Confirm Password not same.</b> <br>";
                    }
                 }
            ?>

</th></tr><tr align="right"><th>
        <input type="submit" value="Submit">
        </th></tr></table></fieldset></th></td></table></form>

<form action="check1.php">
    <fieldset>
        <legend>Forget password</legend>
        <label for="email">Email:</label>
		<input type="email" id="email" name="email"><br>
        <input type="submit" value="Submit">
    </fieldset>
        


</form>

        
        

</body>
</html>