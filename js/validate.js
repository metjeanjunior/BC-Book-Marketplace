function validateEmail() {
	var subject = document.forms["emailF"]["subject"].value;
    var sEMSG=document.getElementById("sEMSG");
    var messages = document.forms["emailF"]["message"].value;
    var mEMSG=document.getElementById("mEMSG");
    var receiver = document.forms["emailF"]["receiver"].value;
    var rEMSG=document.getElementById("rEMSG");

	var bool = true;
    if (subject == null || subject == "") {
        sEMSG.innerHTML = "<center>No subject</center>";
		bool = false;
    }
    if (messages == null || messages == "") {
	    mEMSG.innerHTML = "<center>No message</center>";
	    bool = false;
    }
    if (receiver == null || receiver == "") {
		rEMSG.innerHTML = "<center>No receiver</center>";
		bool = false;
    }
    return bool;
}

function validateNewAdmin() {
    var email = document.forms["newAdmin"]["adminEmail"].value;
    var eAMSG=document.getElementById("eAMSG");
    var password = document.forms["newAdmin"]["adminPassword"].value;
    var pAMSG=document.getElementById("pAMSG");

	var bool = true;
    if (email == null || email == "") {
	 	eAMSG.innerHTML = "<center>Please enter an email</center>";
		bool = false;
    }
    if (password == null || password == "") {
		pAMSG.innerHTML = "<center>Please enter a password</center>";
		bool = false;
    }
    return bool;
}

function validateRemoveBook() {
    var bookName = document.forms["removeBook"]["bookName"].value;
    var bMSG=document.getElementById("bMSG");

	var bool = true;
    if (bookName == null || bookName == "") {
        bMSG.innerHTML = "<center>Please enter a book</center>";
		bool = false;
    }
    return bool;
}

function validateRemoveUser() {
    var username = document.forms["removeUser"]["userName"].value;
    var uMSG=document.getElementById("uMSG");

	var bool = true;
    if (username == null || username == "") {
        uMSG.innerHTML = "<center>Please enter an email</center>";
		bool = false;
    }
    return bool;
}

function validateRemoveAdmin() {
    var username = document.forms["removeAdmin"]["aUsername"].value;
    var aMSG=document.getElementById("aMSG");

	var bool = true;
    if (username == null || username == "") {
        aMSG.innerHTML = "<center>Please enter an email</center>";
		bool = false;
    }
    return bool;
}