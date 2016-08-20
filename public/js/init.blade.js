(function($){
  $(function(){
    $('.button-collapse').sideNav();
  }); // end of document ready
})(jQuery); // end of jQuery name space

var page = 1;
function loadMoreCommentaires(){
  page++;
   $.ajax({
    method: 'GET',
    url: article.id+'?page='+page,
    data: "",
    dataType:"json", 
  })
    .done(function(data) {
      $.each(data.data, function(){
        var html = "<div class='divider'></div><div class='section'><h5 class='small'>"+this.auteur+"</h5><p class='justify dotdotdot commentaire'>"+this.contenu+"</p></div>";
        $('.commentaire-container').append(html);
        $('.commentaire').readmore({
          speed: 75,
          moreLink: '<a href="#">Plus</a>',
          lessLink: '<a href="#">Moins</a>',
        });
      });
    })
    .fail(function(data){
      //alert('fail');
      console.log(data);
    })
}

$(document).ready(function(){

  $('.modal-trigger').leanModal();

  $('#like').on('click', function(){
    var id = article.id;
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        method: 'POST',
        url: id+"/like",
        data: "",
        dataType:"json", 
      })
        .done(function(data) {
          $('#badge-perso').text(data);
          //console.log(data);
        })
        .fail(function(data){
          //console.log(data);
        })

  })

   /* $('.savoir-plus').on('click', function(){
    var id = $(this).data('id');
    window.location('actuskes#'+id);
    $("#"+id).addClass('active'); 
  }) */

  $("#textarea").cleditor();

    $(".bandeau-rubrique").each(function(){
    var bandeau = $(this);
    var categorie_id = $(this).data('cat');
    $.each(categories, function(index,value){
      if(value.id == categorie_id){
        var styles = {
            backgroundColor : value.couleur,
            color: value.couleur_police,
          };
          bandeau.css( styles );
          bandeau.text(value.name);
      }
    })
  })

  $('.commentaire').readmore({
  speed: 75,
  moreLink: '<a href="#">Plus</a>',
  lessLink: '<a href="#">Moins</a>',
});

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

    if( height < background.outerHeight()-40) {
    	$("#navbar").addClass("transparent");
        $("#navbar").removeClass("blue darken-3");
    }
    
    if( height  > background.outerHeight()-40 ) {
        $("#navbar").addClass("blue darken-3");
        $("#navbar").removeClass("transparent");
    }
   
}); 

})

var h = $('.card-image').outerWidth();
$('.card-image').css({height: h + 'px'});

$('.delete').on('click', function (event) {
  console.log('delete')
  var button = $(this)
  var name = button.data('name')
  var modal = $("#modalDelete");
  console.log(button.data('id'));
  modal.openModal();
  modal.find('#titre').text('Supprimer la rubrique '+name );
  modal.find('#contenu').text('Est-tu sûr de vouloir supprimer la rubrique '+name+' ?');
  modal.find('.confirm').attr('data-id',button.data('id'));
})

$('.confirm').on('click', function (event){
  console.log('confirm');
  var button= $(this);
  var id = button.data('id');
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
    method: 'DELETE',
    url: 'categorie/'+id,
    data: "",
    dataType:"json", 
  })
    .done(function(data) {
      location.reload();
    })
    .fail(function(data){
      //console.log(data);
    })
})

$('.deleteActu').on('click', function (event){
  console.log('confirm');
  var button= $(this);
  var id = button.data('id');
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
    method: 'DELETE',
    url: '../../actuskes/'+id,
    data: "",
    dataType:"json", 
  })
    .done(function(data) {
      window.location='../../';
    })
    .fail(function(data){
      //console.log(data);
    })
})

$('.valider').on('click', function (event){
  //alert('validé');
  var button= $(this);
  var id = button.data('id');
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
    method: 'POST',
    url: id+'/valider',
    data: "",
    dataType:"json", 
  })
    .done(function(data) {
      window.location='../article';
    })
    .fail(function(data){
      //console.log(data);
    })
})

$('.supprimer').on('click', function (event) {
  var modal = $("#modalSupprimer")
  modal.openModal();
  modal.find('#titre').text('Supprimer l\'article' );
  modal.find('#contenu').text('Est-tu sûr de vouloir supprimer cet article ? Cette opération est irréversible.');
})

$('#confirm-supprimer').on('click', function (event){
  var id = $(this).data('id');
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
    method: 'DELETE',
    url: '',
    data: "",
    dataType:"json", 
  })
    .done(function(data) {
      window.location='../';
    })
    .fail(function(data){
      //console.log(data);
    })
})

$('#delete-ik').on('click', function (event) {
  var button = $(this)
  var id = button.data('id')
  console.log(id);
$.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
    method: 'DELETE',
    url: '../'+id,
    data: "",
    dataType:"json", 
  })
    .done(function(data) {
      //console.log(data);
      window.location='/infokes-dev/public/ik';
    })
    .fail(function(data){
      //console.log(data);
    })
})

$('.connect').on('click', function (event) {
  var button = $(this)
  var role = button.data('role')
$.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
    method: 'POST',
    url: 'connect',
    data: { role : role },
    dataType:"json", 
  })
    .done(function(data) {
      //console.log(data);
    })
    .fail(function(data){
      //console.log(data);
    })
})
