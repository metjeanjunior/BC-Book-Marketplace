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
	    lSG.innerHTML = "Please enter a last name";
		bool = false;
    }
    if (email == null || email == "") {
	 	eMSG.innerHTML = "Please enter an email";
		bool = false;
    }
    if (username == null || username == "") {
		uMSG.innerHTML = "Please enter a username";
		bool = false;
    }
    if (password == null || password == "") {
		pMSG.innerHTML = "Please enter a password";
		bool = false;
    }
    return bool;
}

function validateRegistrationForm() {
    var book = document.forms["registration"]["book"].value;
    var bMSG=document.getElementById("bMSG");
    var sender = document.forms["registration"]["sender"].value;
    var sMSG=document.getElementById("sMSG");
    var receiver = document.forms["registration"]["receiver"].value;
    var rMSG=document.getElementById("rMSG");

	var bool = true;
    if (book == null || book == "") {
        bMSG.innerHTML = "Please enter a book";
		bool = false;
    }
    if (sender == null || sender == "") {
	    sSG.innerHTML = "Please enter a sender";
		bool = false;
    }
    if (receiver == null || receiver == "") {
	 	rMSG.innerHTML = "Please enter a receiver";
		bool = false;
    }
    return bool;
}

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
