function otpSend(){
    var otp = document.getElementById("otp_match").value;

    if(otp.trim()==""){
        document.getElementById("otp_error-js").innerHTML="Enter OTP.";
        return false;
    }else{
        document.getElementById("otp_error-js").innerHTML="";
    }
    return true;
}