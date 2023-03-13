<?php
$forget=$_POST['email'];

$msg="code:1244";
// $msg=$wordwrap($msg,70);

mail($forget,"Forget Password",$msg);
echo "Success";




?>