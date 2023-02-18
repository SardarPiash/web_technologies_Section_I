<?php
session_start();
if(isset($_POST['cookie'])) {
    setcookie('bgcolor', '', time() + 3600); 
    $color = 'white';
    header ('location:index.php');
}


?>