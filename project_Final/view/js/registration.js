function registration() {
    var name = document.getElementById("name").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var bloodGroup = document.getElementById("bloodgroup").value;
    var dob = document.getElementById("dob").value;
    var address = document.getElementById("address").value;

    if (name.trim() == "") {
        document.getElementById("name-error").innerHTML = "Enter Name";
        return false;
    } else {
        document.getElementById("name-error").innerHTML = "";
    }

    if (username.trim() == "") {
        document.getElementById("username-error").innerHTML = "Enter Username";
        return false;
    } else {
        document.getElementById("username-error").innerHTML = "";
    }

    if (password.trim() == "") {
        document.getElementById("password-error").innerHTML = "Enter Password";
        return false;
    } else {
        document.getElementById("password-error").innerHTML = "";
    }

    if (email.trim() == "") {
        document.getElementById("email-error").innerHTML = "Enter Email";
        return false;
    } else {
        document.getElementById("email-error").innerHTML = "";
    }

    if (phone.trim() == "") {
        document.getElementById("phone-error").innerHTML = "Enter Phone Number";
        return false;
    } else {
        document.getElementById("phone-error").innerHTML = "";
    }
    if (!document.querySelector("input[name='gender']:checked")) {
        document.getElementById("gender-error").innerHTML = "Enter Gender";
        return false;
    } else {
        document.getElementById("gender-error").innerHTML = "";
    }

    if (bloodGroup.trim() == "" || bloodGroup.trim() == "None") {
        document.getElementById("bloodgroup-error").innerHTML = "Enter Blood Group";
        return false;
    } else {
        document.getElementById("bloodgroup-error").innerHTML = "";
    }

    if (address.trim() == "") {
        document.getElementById("address-error").innerHTML = "Enter Address";
        return false;
    } else {
        document.getElementById("address-error").innerHTML = "";
    }

    if (dob.trim() == "") {
        document.getElementById("dob-error").innerHTML = "Enter Date of Birth";
        return false;
    } else {
        document.getElementById("dob-error").innerHTML = "";
    }
    if (!document.querySelector("input[name='status']:checked")) {
        document.getElementById("status-error").innerHTML = "Enter Status";
        return false;
    } else {
        document.getElementById("status-error").innerHTML = "";
    }

    return true;
}

