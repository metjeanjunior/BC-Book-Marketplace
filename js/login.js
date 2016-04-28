$(function() {
	var $formLogin = $("#login-form");
	var $formRegister = $("#register-form");
	var $formForgot = $("#forgot-form");

	$("#login-forgot").click(function(){
		$formLogin.toggle();
		$formForgot.toggle();
	});
	$("#login-register").click(function(){
		$formLogin.toggle();
		$formRegister.toggle();
	});
	$("#forgot-login").click(function(){
		$formForgot.toggle();
		$formLogin.toggle();
	});
	$("#forgot-register").click(function(){
		$formForgot.toggle();
		$formRegister.toggle();
	});
	$("#register-login").click(function(){
		$formRegister.toggle();
		$formLogin.toggle();
	});
	$("#register-forgot").click(function(){
		$formRegister.toggle();
		$formForgot.toggle();
	});
});

function validateForgot()
{
	return emailExits();
}

function emailExits()
{
	var email = document.getElementById('forgot-email').value;
	var emailregex = /^\S+\@{1}\S+\.{1}\S+/;

	if (email.length == 0)
	{
		emailErr.innerHTML = "Please enter an <b>Email<b>.";
		return false;
	}

	if (!emailregex.test(email))
	{
		emailErr.innerHTML = "Please enter a valid <b>Email<b>." + email;
		return false;
	}

	// var count = 0;

	// var ajax = new XMLHttpRequest();
	// ajax.onreadystatechange = function() 
	// {
	// 	if (ajax.readyState == 4) 
	// 		count = ajax.responseText;
	// };

	// ajax.open("GET", "../php/forgotPass.php?find="+email, true);
	// ajax.send(count);

	// if (count == 0)
	// {
	// 	emailErr.innerHTML = "Your email was not found in our database.<br> Please try again";
	// 	$("#emailErr").toggle();
	// 	return false;
	// }
	
	// else if (count = -1)
	// {
	// 	emailErr.innerHTML = "<strong>Something is wrong!</strong> That's all we can tell you.<br> If the problem persists, please contact the developers through the contact us page.";
	// 	$("#emailErr").toggle();
	// 	return false;
	// }

	return true;
}