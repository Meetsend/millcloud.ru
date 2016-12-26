$(document).ready(function() {

	$('.uptab').click(function() {
		$('a').removeClass('settab');
  	$(this).addClass('settab');
		$.get( "/Partners/load_p", function( data ) {
  $( "#loadfr" ).html( data );
});
  });

});
