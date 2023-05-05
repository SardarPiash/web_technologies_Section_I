<?php 
session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="button.css">
    <script type="text/javascript" src="js/registration.js"></script>
    <title>Document</title>
</head>
<style>
    body{
        background-color:lightgreen;
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
    .error{
       color:red;
       font-style: italic;
    }
</style>
<body align="center">
<h1 align="center">Registration Here</h1>
<hr color="red" size="5">
<table align="center">
    <tr>
        <th>
        <form method="post" action="../controller/registration_check.php" onsubmit="return registration()" novalidate>
        <fieldset>
            <legend><h3>Registration</h3></legend>  
            <table align="center">
            <tr>
        <th align="left">
    
            <?php
                 if(isset($_SESSION['name_err']))
                 {
                    echo $_SESSION['name_err'];
                    unset($_SESSION['name_err']);
                 }
            ?> <br>
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name']:"" ?>" placeholder="Enter your name..">
            <?php unset($_SESSION['name']); ?> <br>
            <p class="error" id="name-error"></p>
        </th>
    </tr>
    <tr>
        <th align="left">
    
            <?php
                 if(isset($_SESSION['username_err']))
                 {
                    echo $_SESSION['username_err'];
                    unset($_SESSION['username_err']);
                 }
            ?><br><div id="username_error"></div>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username']:"" ?>" placeholder="Enter your Username..">
            <?php unset($_SESSION['username']); ?><br>
            <p class="error" id="username-error"></p>
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
                <p class="error" id="password-error"></p>
        </th>
    </tr>
    <tr>
        <th align="left">
            <?php
                    if(isset($_SESSION['email_err']))
                    {
                        echo $_SESSION['email_err'];
                        unset($_SESSION['email_err']);
                    }
                ?><br>
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email']:"" ?>" placeholder="Enter email.."> 
                <?php unset($_SESSION['email']); ?><br>
                <p class="error" id="email-error"></p>
        </th>
    </tr>
    <tr>
        <th align="left">
            <?php
                    if(isset($_SESSION['phone_err']))
                    {
                        echo $_SESSION['phone_err'];
                        unset($_SESSION['phone_err']);
                    }
                ?><br>
                <label for="phone">Phone Number: </label>
                <input type="number" id="phone" name="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone']:"" ?>" placeholder="Enter phone Number.."> 
                <?php unset($_SESSION['phone']); ?><br>
                <p class="error" id="phone-error"></p>
        </th>
    </tr>
    <tr>
        <th align="left">
            <?php
                    if(isset($_SESSION['gender_err']))
                    {
                        echo $_SESSION['gender_err'];
                        unset($_SESSION['gender_err']);
                    }
                ?><br>
                <label for="gender">Gender: </label>
                <input type="radio" id="gender" name="gender" value="Male">Male
                <input type="radio" id="gender" name="gender" value="Female">Female
                <input type="radio" id="gender" name="gender" value="Others">Others <br>
                <p class="error" id="gender-error"></p>
        </th>
    </tr>
    <tr>
        <th align="left">
            <?php
                    if(isset($_SESSION['bloodgroup_err']))
                    {
                        echo $_SESSION['bloodgroup_err'];
                        unset($_SESSION['bloodgroup_err']);
                    }
                ?><br>
                <label for="bloodgroup">Blood Group: </label>
                <select name= "bloodgroup" id="bloodgroup">
                    <option>None</option>
                    <option>A+</option>
                    <option>B+</option>
                    <option>A-</option>
                    <option>B-</option>
                    <option>O+</option>
                </select><br>
                <p class="error" id="bloodgroup-error"></p>
        </th>
    </tr>
    <tr>
        <th align="left">
            <?php
                    if(isset($_SESSION['dob_err']))
                    {
                        echo $_SESSION['dob_err'];
                        unset($_SESSION['dob_err']);
                    }
                ?><br>
                <label for="dob">Date of birth: </label>
                <input type="date" id="dob" name="dob" value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob']:"" ?>">
                <?php unset($_SESSION['dob']); ?><br>
                <p class="error" id="dob-error"></p>
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
                <input type="radio" id="status" name="status" value="admin">Admin
                <input type="radio" id="status" name="status" value="seller">Seller
                <input type="radio" id="status" name="status" value="buyer">Buyer
                <br>
                <p class="error" id="status-error"></p>
        </th>
    </tr>
    <tr>
        <th align="left">
            <?php
                    if(isset($_SESSION['address_err']))
                    {
                        echo $_SESSION['address_err'];
                        unset($_SESSION['address_err']);
                    }
                ?><br>
                <label for="address">Address: </label>
                <textarea name="address" id="address" cols="30" rows="1" ></textarea>
                <br>
                <p class="error" id="address-error"></p>
        </th>
    </tr>
    <tr>
        <th>
            <table align="center">
                <tr>
                    <td>
                        <input type="submit" value="Registration" class="button" ><br>
                        <br>
                        <?php
                            if(isset($_SESSION['user_err']))
                            {
                                echo $_SESSION['user_err'];
                                unset($_SESSION['user_err']);
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </th>
    </tr>
</table>
</form>
</fieldset>
</th>
</tr>
</table> 
<p align="center">Already have an account? Login <a href="login.php">here</a></p>
<?php
include 'footer.php';
?> 
</body>
</html>