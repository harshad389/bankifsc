function w3_open() {
  document.getElementById("main").style.marginLeft = "10%";
  document.getElementById("mySidenav").style.width = "60%";
  document.getElementById("mySidenav").style.display = "block";
 document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
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

function list_submit(type,val){

 $('#'+type).val(val);$('#select_form').submit();
}


function close_div(e){
  e.parentElement.style.display="none";
}

function attention(id){
  $( "#"+id ).effect( "shake" );$( "#ifsc_large" ).focus();
}


/* Start Search bank by ifsc */

$(function(){
    $('.ifsc_form').on(' submit click' ,function(event){
        event.preventDefault();
        w3_close();
        var ifsc_large=$('#ifsc_large').val();
        var ifsc_small=$('#ifsc_small').val();
        var ifsc_code;
        var url=$('#url').val();
        if(ifsc_large.length==0){ifsc_code=ifsc_small;}else{ifsc_code=ifsc_large;}
        if(ifsc_code.length!=0){
     $.ajax({
                      url:url+'home/get',
                      type: 'POST',
                       dataType: 'html',
                      data: {ifsc_code:ifsc_code},
                      success:function(data){
                         $('#bank_detail').fadeOut();
                         $('#ifsc_result').html(data).fadeIn(2000);

                      }
                  })
                
  }
});

});
/* end Search bank by ifsc */

/* Start copy to clipboard */

  var btns = document.querySelectorAll('button');
    var clipboard = new Clipboard(btns);

/* End copy to clipboard */         
                          
function copy(e){
  var btns = document.querySelectorAll('button');
    var clipboard = new Clipboard(btns);
    e.innerHTML='Copied!';
    
}

       

