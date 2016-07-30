(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function() {
    $('select').material_select();
    $('.carousel').carousel();
});

// Search Bank By IFSC
$(document).ready(function() {
	//$('#ifsc_result').hide();
	$("#form_ifsc").on("submit blur",function(event){

		event.preventDefault();
		var ifsc_search=$('#ifsc_search').val();
		$.ajax({
			url: 'http://localhost/bankifsc/home/bank_search',
			type: 'POST',

			data: {ifsc_search: ifsc_search},
			beforeSend: function(){
				$('#loader').show().hide(2000);
			},
			success: function(json){
				data = JSON.parse(json);
				$("#ifsc_search").val("");
				if(Object.keys(data).length){
					var txt = "";
					txt+='<ul class="collection with-header"><li class="collection-header"><h5>Bank Detail</h5></li>'
					txt += '<li class="collection-item">BANK:'+data[0].bank+'</li>';
					txt += '<li class="collection-item">IFSC CODE:'+data[0].ifsc+'</li>';
					txt += '<li class="collection-item">MICR CODE:'+data[0].micr+'</li>';
					txt += '<li class="collection-item">BRANCH NAME:'+data[0].branch+'</li>';
					txt += '<li class="collection-item">ADDRESS:'+data[0].address+'</li>';
					txt += '<li class="collection-item">CONTACT:'+data[0].contact+'</li>';
					txt += '</ul>';
					
					$('#ifsc_result').html(txt);
					Materialize.showStaggeredList('#ifsc_result');
				}
				else
				{    $('#ifsc_result').fadeOut(1000);
					 var $toastContent = $('<span><i>Please Enter Correct IFSC Code</i></span>');
  						$('#ifsc_result').append(Materialize.toast($toastContent,4000));
				}
			}
		});
	});
});