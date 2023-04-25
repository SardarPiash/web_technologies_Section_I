function card(){
    var method = document.getElementById("select_bank").value;
    var accountNumber= document.getElementById("card_number").value;
    if(method.trim()=="Select One"){
        alert("Select A Bank Name Please.");
        return false;
    }
    if(accountNumber.trim()==""){
        document.getElementById("account_number_error").innerHTML="Enter Account Number Please.js";
        return false;
    }else if(accountNumber.length<11 || accountNumber.length>11){
        document.getElementById("account_number_error").innerHTML="Account Number Should be 11 Number.js";
        return false;
    }else{
        document.getElementById("account_number_error").innerHTML="";
    }
}