console.log('article/'+article.id+'?page=2');
(function($){
  $(function(){
    $('.button-collapse').sideNav();
  }); // end of document ready
})(jQuery); // end of jQuery name space

function loadMoreCommentaires(){
   $.ajax({
    method: 'GET',
    url: article.id+'?page=2',
    data: "",
    dataType:"html", 
  })
    .done(function(data) {
      console.log(data);
    })
    .fail(function(data){
      alert('fail');
      console.log(data);
    })
}

$(document).ready(function(){

  $(".dotdotdot").dotdotdot({
    ellipsis  : '... ',
    wrap    : 'word',
    fallbackToLetter: true,
    after   : null,
    watch   : true,
    height    : null,
    tolerance : 20,
    /*  Callback function that is fired after the ellipsis is added,
      receives two parameters: isTruncated(boolean), orgContent(string). */
    callback  : function( isTruncated, orgContent ) {},
    lastCharacter : {
      /*  Remove these characters from the end of the truncated text. */
      remove    : [ ' ', ',', ';', '.', '!', '?' ],
      /*  Don't add an ellipsis if this array contains 
        the last character of the truncated text. */
      noEllipsis  : []
    }
  });

	$(".dropdown-content").dropdown();

	 $('.slider').slider({
	 	full_width: true,
	 	indicators:false,
	 	height:400
	 });

	 $('.collapsible').collapsible({
      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'yyyy-mm-dd',
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

var h = $('.card-image').outerWidth();
$('.card-image').css({height: h + 'px'});

$('.savoir-plus').on('click', function (event) {
  var button = $(this) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  $('#modalActus').openModal(); 
  // AJAX request here (and then do the updating in a callback).
  $.ajax({
    method: 'GET',
    url: 'actuskes/'+id,
    data: "",
    dataType:"json", 
  })
    .done(function(data) {
      //console.log(data);
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $("#modalActus");
      modal.find('.titre').text(data.titre);
      modal.find('.contenu').text(data.contenu);
    })
    .fail(function(data){
      //console.log(data);
    })
})
