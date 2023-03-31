<?php
session_start();


if (!isset($_POST['gender'])) {
    $_POST['gender'] = "";
    
}
if (!isset($_POST['status'])) {
    $_POST['status'] = "";
    
}
if($_SERVER['REQUEST_METHOD'] === "POST")
    {
    $flag=true;
    $id=$_SESSION['username'];
    $name=sanitize($_POST['name']);
    $username=sanitize($_POST['username']);
    $email=sanitize($_POST['email']);
    $phone=sanitize($_POST['phone']);
    $gender=sanitize($_POST['gender']);
    $dob=sanitize($_POST['dob']);
    $bloodgroup=sanitize($_POST['bloodgroup']);
    $address=sanitize($_POST['address']);

    if(empty($name))
    {
        $_SESSION['name_update_err']='<b style="color:red">*Enter your name please.</b>';
        $flag=false; 
        
    }else{
        $_SESSION['name_update_err']="";
        $_SESSION['name_update']=$name;
    }
    if(empty($username))
    {
        $_SESSION['username_update_err']='<b style="color:red">*Enter your username please.</b>';
        $flag=false;    
    }
    elseif($username!=$_SESSION['username']){
        $_SESSION['username_update_err']='<b style="color:red">*Username Can not be changed.</b>';
        $flag=false;
    }
    else{
        $_SESSION['username_update_err']="";
    }
    if(empty($email))
    {
        $_SESSION['email_update_err']='<b style="color:red">*Enter your email please.</b>';
        $flag=false;
    }else{
        $_SESSION['email_update_err']="";
        $_SESSION['email_update']=$email;
    }
    if(empty($phone))
    {
        $_SESSION['phone_update_err']='<b style="color:red">*Enter your phone number please.</b>';
        $flag=false;
    }else{
        $_SESSION['phone_update_err']="";
        $_SESSION['phone_update']=$phone;
    }
    if(empty($gender))
    {
        $_SESSION['gender_update_err']='<b style="color:red">*Enter your gender please.</b>';
        $flag=false;
    }else{
        $_SESSION['gender_update_err']="";
        $_SESSION['gender_update']=$gender;
    }
    if(empty($bloodgroup))
    {
        $_SESSION['bloodgroup_update_err']='<b style="color:red">*Enter your blood group please.</b>';
        $flag=false;
    }else{
        $_SESSION['bloodgroup_update_err']="";
        $_SESSION['bloodgroup_update']=$bloodgroup;
    }
    if($bloodgroup=="None")
    {
        $_SESSION['bloodgroup_update_err']='<b style="color:red">*Enter your blood group please.</b>';
        $flag=false;
    }else{
        $_SESSION['bloodgroup_update_err']="";
        $_SESSION['bloodgroup_update']=$bloodgroup;
    }
    if(empty($dob))
    {
        $_SESSION['dob_update_err']='<b style="color:red">*Enter your date of birth please.</b>';
        $flag=false;
    }else{
        $_SESSION['dob_update_err']="";
        $_SESSION['dob_update']=$dob;
    }
    if(empty($address))
    {
        $_SESSION['address_update_err']='<b style="color:red">*Enter your address please.</b>';
        $flag=false;
    }else{
        $_SESSION['address_update_err']="";
        $_SESSION['address_update']=$address;
    }
    if($flag){
        include 'update_page_db.php';
            if (isset($_SESSION['stmt']) && $_SESSION['stmt']) {
                $_SESSION['update_done']='<b style="color:red">*Successfully update*</b>';
                header('location:sellerdashboard.php');
            }else{
                header('location:update_page.php');
            }       
    }else{
        header('location:update_page.php');
    }
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>