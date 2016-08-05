

function w3_open() {
  
  document.getElementById("mySidenav").style.width = "50%";
  document.getElementById("mySidenav").style.display = "block";

}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidenav").style.display = "none";
  
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

    $('.ifsc_form').on('submit click' ,function(event){
        event.preventDefault();
        w3_close();
        var ifsc_large=$('#ifsc_large').val();
        var ifsc_small=$('#ifsc_small').val();
        var ifsc_code;
        var url=$('#url').val();
        if(ifsc_large.length==0){ifsc_code=ifsc_small;}else{ifsc_code=ifsc_large;}
     $.ajax({
                      url:url+'home/get',
                      type: 'POST',
                       dataType: 'html',
                      data: {ifsc_code:ifsc_code},
                      success:function(data){
                 
                         $('#ifsc_result').html(data).fadeIn(2000);
                      }
                  })
                
  });
});

         
                          


       

