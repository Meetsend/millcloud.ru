$(document).ready(function() {

	$('.subm, #back, .sbm').css('display','none');

	$('.clicker').click(function() {
		$('.subm').css('display','none');
  	$(this).parents().children('.subm').toggle("fast");
  });

  $('#price .inline').click(function() {
  	$('.subm').css('display','none');
    $('#back').toggle("fast");
   	$(this).parents().children('.sbm, .linker, .list').toggle("fast");
  });

});
