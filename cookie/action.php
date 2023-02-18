<?php
session_start();


if($_SERVER['REQUEST_METHOD']==="POST")
{
    
    
    $color = 'white';
		$time = time() + 0;
        // $_SESSION['time']=$time;
		if(isset($_POST['color']) && isset($_POST['time'])) {
			$color = $_POST['color'];
			$time = strtotime($_POST['time']); 
			setcookie('bgcolor', $color, $time);
		}
		if(isset($_COOKIE['bgcolor']) && $_COOKIE['bgcolor'] == $color && time() < $time) {
			$color = $_COOKIE['bgcolor'];
            header ('location:index.php');
		}
    }        
?>