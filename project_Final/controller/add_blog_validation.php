<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST"){

    $blog_title=sanitize($_POST['blog_title']);
    $blog=sanitize($_POST['blog']);
    $flag = true;
    $move=false;
    if (empty($blog_title)) {
        $_SESSION['blog_title_err']='<b style="color:red">*Enter Blog Title.</b>';
        $flag = false;
    }else{
        $_SESSION['blog_title_err']="";
        $_SESSION['blog_title']=$blog_title;
    }
    if (empty($blog)) {
        $_SESSION['blog_err']='<b style="color:red">*Enter Your Blog.</b>';
        $flag = false;
    }else{
        $_SESSION['blog_err']="";
        $_SESSION['blog']=$blog;
    }
    if (sanitize(isset($_FILES['product_image']))) {
        
    
        $img_name = $_FILES['product_image']['name'];
        $img_size = $_FILES['product_image']['size'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $error = $_FILES['product_image']['error'];

            if ($img_size > 125000) {
                $_SESSION['product_image_err']='<b style="color:red">*Image size is big...</b>';
                $flag = false;
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $move=true;
                }else {
                    $_SESSION['product_image_err']='<b style="color:red">*Enter Product Image First...</b>';
                    $flag = false;
                }
            }
    }else {
        $_SESSION['image_err']='<b style="color:red">*Enter Product Image First...</b>';
        $flag = false;
    }
    if($flag===true){
        if($move==true){
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = '../uploads/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            $_SESSION['new_img_name']=$new_img_name;
        }
        include '../model/add_blog_validation_db.php';
        header("Location: ../view/blog.php");
    }else{
        header('location: ../view/add_blog.php');
    }
}

function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>