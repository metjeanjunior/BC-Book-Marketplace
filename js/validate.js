function validateAddDepartmentForm() {
    var department = document.forms["addDepartment"]["department"].value;
    var dMSG=document.getElementById("dMSG");

	var bool = true;
    if (department == null || department == "") {
        dMSG.innerHTML = "Please enter a department";
		bool = false;
    }
    return bool;
}

function validateRegistrationForm() {
    var firstName = document.forms["registration"]["firstName"].value;
    var fMSG=document.getElementById("fMSG");
    var lastName = document.forms["registration"]["lastName"].value;
    var lMSG=document.getElementById("lMSG");
    var email = document.forms["registration"]["email"].value;
    var eMSG=document.getElementById("eMSG");
    var username = document.forms["registration"]["username"].value;
    var uMSG=document.getElementById("uMSG");
    var password = document.forms["registration"]["password"].value;
    var pMSG=document.getElementById("pMSG");

	var bool = true;
    if (firstName == null || firstName == "") {
        fMSG.innerHTML = "Please enter a first name";
		bool = false;
    }
    if (lastName == null || lastName == "") {
	        fMSG.innerHTML = "Please enter a last name";
			bool = false;
    }
    return bool;
}