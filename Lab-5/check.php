<?php
$current=$_POST['current'];
$new=$_POST['new'];
$confirm=$_POST['confirm'];
$flag=true;

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    if(empty($current)){
        header("Location: Index.php?err=cur");
     }
     elseif($current==$new){
        header("Location: Index.php?err=same");
        }
 
elseif(empty($new)){
        header ("Location: Index.php?err=new");
     }
  elseif(empty($confirm)){
        header ("Location: Index.php?err=con");
     }
     elseif($confirm==$new){
        $flag=false;
        if($flag===true){
            header ("Location: Index.php?err=same2");
        }
        
    }

}


?>