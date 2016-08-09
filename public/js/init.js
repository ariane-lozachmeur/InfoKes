(function($){
  $(function(){
    $('.button-collapse').sideNav();
  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function(){
	$(".dropdown-content").dropdown();

	 $('.slider').slider({
	 	full_width: true,
	 	indicators:false,
	 	height:400
	 });

	 $('.collapsible').collapsible({
      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

     $('#date').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

    $('select').material_select();

$(window).scroll(function() {
    var height = $(window).scrollTop();
    var background = $('.slider')

    if( height < background.outerHeight()-20) {
    	$("#navbar").addClass("transparent");
        $("#navbar").removeClass("blue darken-3");
    }
    
    if( height  > background.outerHeight()-20 ) {
        $("#navbar").addClass("blue darken-3");
        $("#navbar").removeClass("transparent");
    }
   
}); 

})

//assuming you're using jQuery
var h = $('.card-image').outerWidth();
$('.card-image').css({height: h + 'px'});