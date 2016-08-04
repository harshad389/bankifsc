

function w3_open() {

    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
function w3_show_nav(name) {
    document.getElementById("menuTut").style.display = "none";
    document.getElementById("menuRef").style.display = "none";
    document.getElementById(name).style.display = "block";
    w3_open();
}

function accordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}



$(function(){

    $('#ifsc_form').submit(function(){
        event.preventDefault();
        var ifsc_code=$('#ifsc_search').val();
        
     $.ajax({
                      url:'http://localhost/bankifsc/home/get',
                      type: 'POST',
                       dataType: 'html',
                      data: {ifsc_code:ifsc_code},
                      success:function(data){
                         
                         $('#ifsc_result').html(data).fadeIn(2000);
                      }
                  })
                
  });
});

         
                          


       

