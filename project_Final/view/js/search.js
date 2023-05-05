function userempty() {
	var username = document.getElementById("username").value;
	if (username.trim() == "") {
	  alert("Enter Username.");
	  return false;
	}
	return true;
  }
  
function search(pForm) {
	if (!userempty()) {
        return false;
    }
	const method = pForm.method;
	const key = pForm.username.value;
	const url = pForm.action + "?username=" + key;

	let xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
            document.getElementById("header").innerHTML = "<u>Your Username & Password is: </u>";
		    document.getElementById("username_error").innerHTML = this.responseText;
		}
	xhttp.open(method, url);
	xhttp.send();

	return false;

}
