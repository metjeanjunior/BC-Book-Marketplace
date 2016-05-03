$(function()
{
	var $transactions = $("#transactions-div");
	var $email = $("#update-email-div");
	var $password = $("#update-password-div");

	$("#transactions-button").click(function(){
		$email.hide();
		$password.hide();
		$transactions.show();
	});
	$("#update-email-button").click(function(){
		$email.show();
		$password.hide();
		$transactions.hide();
	});
	$("#update-password-button").click(function(){
		$email.hide();
		$password.show();
		$transactions.hide();
	});
});

function validateEmail()
{
	return emailExists();
}

function emailExists()
{
	var email = document.getElementById('current-email').value;
	var emailregex = /^\S+\@{1}\S+\.{1}\S+/;

	if (email.length == 0)
	{
		updateEmailErr.innerHTML = "Please enter an <b>Email<b>.";
		return false;
	}

	if (!emailregex.test(email))
	{
		updateEmailErr.innerHTML = "Please enter a valid <b>Email<b>." + email;
		return false;
	}
	return true;
}