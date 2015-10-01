$('#username').focusin(function(){
	$('#hint1').removeClass('hint');
	$('#hint1').addClass('hintt');
});

$('#username').focusout(function(){
	$('#hint1').removeClass('hintt');
	$('#hint1').addClass('hint');
});


$('#password').focusin(function(){
	$('#hint2').removeClass('hint');
	$('#hint2').addClass('hintt');
});

$('#password').focusout(function(){
	$('#hint2').removeClass('hintt');
	$('#hint2').addClass('hint');
});