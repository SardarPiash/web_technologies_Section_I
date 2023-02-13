<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (!isset($_POST['gender'])) {
        $_POST['gender'] = "";
        
    }
   if ($_SERVER['REQUEST_METHOD'] === "POST")
   {
    $status=true;
    $firstname=sanitize($_POST['firstname']);
    $lastname=sanitize($_POST['lastname']);
    $fathername=sanitize($_POST['fathername']);
    $mothername=sanitize($_POST['mothername']);
    $gender=sanitize($_POST['gender']);
    $dob=sanitize($_POST['dob']);
    $blood=sanitize($_POST['blood']);
    $email=sanitize($_POST['email']);
    $phone=sanitize($_POST['phone']);
    $website=sanitize($_POST['website']);
    $address=sanitize($_POST['address']);
    $username=sanitize($_POST['username']);
    $password=sanitize($_POST['password']);
    

    if(empty($firstname)){
        echo "Enter Firstname.<br>";
        $status=false;
    }
    if(empty($lastname)){
        echo "Enter Lastname.<br>";
        $status=false;
    }
    if(empty($fathername)){
        echo "Enter Father's name.<br>";
        $status=false;
    }
    if(empty($mothername)){
        echo "Enter Mother's name.<br>";
        $status=false;
    }
    
    if(empty($gender)){
        echo "Enter Gender.<br>";
        $status=false;
    }
    if(empty($dob)){
        echo "Enter Date of Birth.<br>";
        $status=false;
    }
    if(empty($blood)){
        echo "Enter blood Group.<br>";
        $status=false;
    }
    if(empty($email)){
        echo "Enter Email.<br>";
        $status=false;
    }else{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email incorrect";
            $status= false;
        }
    }
    if(empty($phone)){
        echo "Enter Phone Number.<br>";
        $status=false;
    }
    if(empty($website)){
        echo "Enter Website.<br>";
        $status=false;
    }
    if(empty($address)){
        echo "Enter Present Address.<br>";
        $status=false;
    }
    if(empty($username)){
        echo "Enter Username.<br>";
        $status=false;
    }
    if(empty($password)){
        echo "Enter password.<br>";
        $status=false;
    }
    if($status==true){
        echo "<table align=center><tr><td>";
        echo "<fieldset>";
        echo "<legend>General Information</legend>";
        echo "<table>";
        echo "<tr><td>First Name:".$firstname."</tr></td>";
        echo "<tr><td>Last Name:".$lastname."</tr></td>";
        echo "<tr><td>Father's Name:".$fathername."</tr></td>";
        echo "<tr><td>Mother's Name:".$mothername."</tr></td>";
        echo "<tr><td>Gender:".$gender."</tr></td>";
        echo "<tr><td>Date of birth:".$dob."</tr></td>";
        echo "<tr><td>Blood Group Name:".$blood."</tr></td></table></fieldset>";
        echo "<fieldset>";
        echo "<legend>Contact Information</legend>";
        echo "<table>";
        echo "<tr><td>Email:".$email."</tr></td>";
        echo "<tr><td>Phone Number:".$phone."</tr></td>";
        echo "<tr><td>Website:".$website."</tr></td>";
        echo "<tr><td>Present Address:".$address."</tr></td></table></fieldset>";
        echo "<fieldset>";
        echo "<legend>Account Information</legend>";
        echo "<table>";
        echo "<tr><td>username:".$username."</tr></td>";
        echo "<tr><td>Password:".$password."</tr></td></table></fieldset>";
        echo "</tr></td></table>";
        echo '<p align=center>Dont have an account? Register <a href="registration.php">here</a> </p>';
        // echo "<a href="registration.php">here</a>";
    }

   }else{
    echo "Wrong approch";
}

   function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

</body>
</html>
</body>
</html>