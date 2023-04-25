function update() {
    var name = document.getElementById("name").value;
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    // var gender = document.getElementById("gender").value;
    var bloodgroup = document.getElementById("bloodgroup").value;
    var dob = document.getElementById("dob").value;
    var address = document.getElementById("address").value;
    
    if (name == "") {
      alert("Please enter a name");
      return false;
    }
    if (username == "") {
        alert("Please enter a username");
        return false;
    }
    if (email == "") {
      alert("Please enter a email");
      return false;
    }
    if (phone == "") {
        alert("Please enter a phone Number");
        return false;
    }
    if (!document.querySelector('input[name="gender"]:checked')) {
        alert("Please enter a Gender");
        return false;
    }
    if (bloodgroup == "") {
        alert("Please enter a bloodgroup");
        return false;
    }
    if (bloodgroup == "None") {
        alert("Blood group can not be None!");
        return false;
    }
    if (dob == "") {
        alert("Please enter a Date of birth");
        return false;
        }
    if (address == "") {
        alert("Please enter a Address");
        return false;
    }
    return true;
  }