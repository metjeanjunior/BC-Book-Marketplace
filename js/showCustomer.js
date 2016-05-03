function validateForgot()
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