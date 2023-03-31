<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false)
{
    header('location:login.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;
    $move=false;
    $productname = sanitize($_POST['productname']);
    $productdetails = sanitize($_POST['productdetails']);
    $productprice = sanitize($_POST['productprice']);
    
    if (empty($productname)) {
        $_SESSION['productname_err']='<b style="color:red">*Enter Product Name First...</b>';
        $flag = false;
    }else{
        $_SESSION['productname_err']="";
        $_SESSION['productname']=$productname;
    }
    
    if (empty($productdetails)) {
        $_SESSION['productdetails_err']='<b style="color:red">*Enter Product Details Frist...</b>';
        $flag = false;
    }else{
        $_SESSION['productdetails_err']="";
        $_SESSION['productdetails']=$productdetails;
    }
    if (empty($productprice)) {
        $_SESSION['productprice_err']='<b style="color:red">*Enter Product Price First...</b>';
        $flag = false;
    }else{
        $_SESSION['productprice_err']="";
        $_SESSION['productprice']=$productprice;
    }
    //Image processing validation.............
    if (sanitize(isset($_FILES['my_image']))) {
    
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
    
        if ($error === 0) {
            if ($img_size > 125000) {
                $_SESSION['image_err']='<b style="color:red">*Image size is big...</b>';
                $flag = false;
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $move=true;
                }else {
                    $_SESSION['image_err']='<b style="color:red">*Enter Product Image First...</b>';
                    $flag = false;
                }
            }
        }else {
            $_SESSION['image_err']='<b style="color:red">*Enter Product Image First...</b>';
            $flag = false;
        }
    
    }else {
        $_SESSION['image_err']='<b style="color:red">*Enter Product Image First...</b>';
        $flag = false;
    }
    
    if($flag===true){
        if($move==true){
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            $_SESSION['new_img_name']=$new_img_name;
        }
        include 'add_product_db.php';
        header("Location: shop.php");
    }else{
        header('location:add_product.php');
    }
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




?>