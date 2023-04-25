function withdraw(){
    var withdrawAmount = document.getElementById("ammount").value;
    
    if(withdrawAmount.trim()==""){
        document.getElementById("withdraw_error").innerHTML="Enter Amount Please.js";
        return false;
    }else{
        document.getElementById("withdraw_error").innerHTML="";
    }
    if(withdrawAmount<50){
        document.getElementById("withdraw_error").innerHTML="Maximum Withdraw 50 tk.js";
        return false;
    }else{
        document.getElementById("withdraw_error").innerHTML="";
    }
    if(withdrawAmount>totalBalance){
        document.getElementById("withdraw_error").innerHTML="Withdraw limit is over total balance.js";
        return false;
    }else{
        document.getElementById("withdraw_error").innerHTML="";
    }
    return true;
}