function changePassword(){
    var currentPassword = document.getElementById("current_password").value;
    var newPassword = document.getElementById("new_password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    
    if(currentPassword.trim()==''){
        alert("Must Enter Current Password.");
        return false;
    }
    if(newPassword.trim()==''){
        alert("Must Enter New Password.");
        return false;
    }
    if(confirmPassword.trim()==''){
        alert("Must Enter Confirm Password.");
        return false;
    }
    if(currentPassword == newPassword){
        alert("Current & New Password can not be same.");
        return false;
    }
    if(currentPassword == confirmPassword){
        alert("Current & Confirm Password can not be same.");
        return false;
    }
    // if(!_.isEqual(newPassword , currentPassword)){
    //     alert("New and Confirm Password Must be same.");
    //     return false;
    // }
   
    return true;
}
