function passwordreset(){
    var username = document.getElementById("username").value;
    if(username.trim()==""){
        document.getElementById("username-error").innerHTML="Enter Username.";
        return false;
    }else{
        document.getElementById("username-error").innerHTML="";
    }
    return true;
}