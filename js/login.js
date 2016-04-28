// inspired by: http://bootsnipp.com/snippets/featured/modal-login-with-jquery-effects

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