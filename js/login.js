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
	var count = 0;
	$.getJSON("forgtoPass.php?find=$email", 
		function(data)
		{
			$.each(data, function(i, info)
			{
				count ++;
			});
		}
	);
	return count > 0;
}