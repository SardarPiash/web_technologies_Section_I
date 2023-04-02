<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $flag=true;
        $select_bank=sanitize($_POST['select_bank']);
        $card_number=sanitize($_POST['card_number']);
        if(empty($select_bank))
        {
            $_SESSION['select_bank_err']='<b style="color:red">* Enter a bank name.</b>';
            $flag=false;    
        }else{
            $_SESSION['select_bank_err']="";
            $_SESSION['select_bank']=$select_bank;
        }
        if($select_bank=="Select One")
        {
            $_SESSION['select_bank_err']='<b style="color:red">* Enter a bank name must.</b>';
            $flag=false;    
        }else{
            $_SESSION['select_bank_err']="";
            $_SESSION['select_bank']=$select_bank;
        }
        if(empty($card_number))
        {
            $_SESSION['card_number_err']='<b style="color:red">* Enter your card Number.</b>';
            $flag=false;  
        }        
        else{
            $_SESSION['card_number_err']="";
            $_SESSION['card_number']=$card_number;
        }
        
        if($flag){
            setcookie("otp","send",time()+300,"/");
            //Email operation to send otp here......
            $_SESSION['send_otp']="4400";
            header("location: ../view/otp_send_card.php");
        }else{
            header("location: ../view/card_banking1.php");
        }

    }
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }




?>