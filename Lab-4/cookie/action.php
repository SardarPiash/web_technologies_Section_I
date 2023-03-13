
<?php
date_default_timezone_set('Asia/Dhaka');

$time=$_POST['time'];


if($_SERVER['REQUEST_METHOD']==="POST")
{
    
    
    // echo $time."<br>";
	$timestamp = strtotime($time);
	
	setcookie('mycookie', $_POST['color'],$timestamp,'/');
		header ('location:index.php');	
    }        
?>