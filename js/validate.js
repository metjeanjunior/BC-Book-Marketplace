function validateEmail() {
	var subject = document.forms["emailF"]["subject"].value;
    var sEMSG=document.getElementById("sEMSG");
    var messages = document.forms["emailF"]["message"].value;
    var mEMSG=document.getElementById("mEMSG");
    var receiver = document.forms["emailF"]["receiver"].value;
    var rEMSG=document.getElementById("rEMSG");

	var bool = true;
    if (subject == null || subject == "") {
        sEMSG.innerHTML = "No subject";
		bool = false;
    }
    if (messages == null || messages == "") {
	    mEMSG.innerHTML = "No message";
	    bool = false;
    }
    if (receiver == null || receiver == "") {
		rEMSG.innerHTML = "No receiver";
		bool = false;
    }
    return bool;
}

function validateNewAdmin() {
    var firstName = document.forms["newAdmin"]["adminFirstName"].value;
    var fAMSG=document.getElementById("fAMSG");
    var lastName = document.forms["newAdmin"]["adminLastName"].value;
    var lAMSG=document.getElementById("lAMSG");
    var email = document.forms["newAdmin"]["adminEmail"].value;
    var eAMSG=document.getElementById("eAMSG");
    var username = document.forms["newAdmin"]["adminUsername"].value;
    var uAMSG=document.getElementById("uAMSG");
    var password = document.forms["newAdmin"]["adminPassword"].value;
    var pAMSG=document.getElementById("pAMSG");

	var bool = true;
    if (firstName == null || firstName == "") {
        fAMSG.innerHTML = "Please enter a first name";
		bool = false;
    }
    if (lastName == null || lastName == "") {
	    lAMSG.innerHTML = "Please enter a last name";
		bool = false;
    }
    if (email == null || email == "") {
	 	eAMSG.innerHTML = "Please enter an email";
		bool = false;
    }
    if (username == null || username == "") {
		uAMSG.innerHTML = "Please enter a username";
		bool = false;
    }
    if (password == null || password == "") {
		pAMSG.innerHTML = "Please enter a password";
		bool = false;
    }
    return bool;
}

function validateRemoveBook() {
    var bookName = document.forms["removeBook"]["bookName"].value;
    var bMSG=document.getElementById("bMSG");

	var bool = true;
    if (bookName == null || bookName == "") {
        bMSG.innerHTML = "Please enter a book";
		bool = false;
    }
    return bool;
}

function validateRemoveUser() {
    var username = document.forms["removeUser"]["userName"].value;
    var uMSG=document.getElementById("uMSG");

	var bool = true;
    if (username == null || username == "") {
        uMSG.innerHTML = "Please enter a username";
		bool = false;
    }
    return bool;
}

function validateRemoveAdmin() {
    var username = document.forms["removeAdmin"]["aUsername"].value;
    var aMSG=document.getElementById("aMSG");

	var bool = true;
    if (username == null || username == "") {
        aMSG.innerHTML = "Please enter a username";
		bool = false;
    }
    return bool;
}