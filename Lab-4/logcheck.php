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
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $status = true;
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);

        if (empty($username)) {
            echo "Enter Username.<br>";
            $status = false;
        }
        
        if (empty($password)) {
            echo "Enter Password.<br>";
            $status = false;	
        }
        if ($status === true) {
            $_SESSION['status']=true;
            header ('location:welcome.php');

        }
    }
    else {
        echo "Sorry bro!";
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