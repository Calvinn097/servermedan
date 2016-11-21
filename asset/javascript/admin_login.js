 $("#login-button").click(function(event){
		 event.preventDefault();
	 $('h1').removeClass('bounce');
	 $('h1').removeClass('infinite');
	 $('form').fadeOut(500);
	 $('.wrapper').addClass('form-success'),setTimeout(function(){$('h1').addClass('fadeOut'),setTimeout(function(){$('form').submit()},600);},1500);
});