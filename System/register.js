$('#username').focusin(function(){
	$('#hint1').removeClass('hint');
	$('#hint1').addClass('hintt');
});

$('#username').focusout(function(){
	$('#hint1').removeClass('hintt');
	$('#hint1').addClass('hint');
});

$('#email').focusin(function(){
	$('#hint2').removeClass('hint');
	$('#hint2').addClass('hintt');
});

$('#email').focusout(function(){
	$('#hint2').removeClass('hintt');
	$('#hint2').addClass('hint');
});

$('#password').focusin(function(){
	$('#hint3').removeClass('hint');
	$('#hint3').addClass('hintt');
});

$('#password').focusout(function(){
	$('#hint3').removeClass('hintt');
	$('#hint3').addClass('hint');
});

/*$('#confirmation').focusin(function(){
	$('#hint4').removeClass('hint');
	$('#hint4').addClass('hintt');
});

$('#confirmation').focusout(function(){
	$('#hint4').removeClass('hintt');
	$('#hint4').addClass('hint');
});*/