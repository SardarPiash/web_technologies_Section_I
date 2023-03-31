<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user_buyer = $_POST['username_buyer'];
    $text = $_POST['text'];
    $flag = true;

    if (empty($user_buyer)) {
        $flag = false;    
    } else {
        $_SESSION['username_err'] = "";
        $_SESSION['user_buyer'] = $user_buyer;
    }

    if (empty($text)) {
        $flag = false;    
    } else {
        $_SESSION['username_err'] = "";    
    }

    if ($flag === true) {
        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "project";
        $con = mysqli_connect($servername, $uname, $pass, $dbname);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $stmt = $con->prepare("INSERT INTO chat ( text, username) VALUES (?, ?)");
            $stmt->bind_param("ss", $text, $_SESSION['user_buyer']);

            $result = $stmt->execute();
            
            if ($result) {
                header("location:customer_communication.php");
            } else {
                echo mysqli_error($con); 
                header("location:buyer_chat.php");
            }
        }
    } else {
        header("location:buyer_chat.php");
    }
}
?>
