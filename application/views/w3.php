<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?php echo $this->config->item('css_path'); ?>/w3css.css">
<link href="<?php echo $this->config->item('css_path'); ?>/font-awesome.min.css" rel="stylesheet">
<!-- <link href="<?php echo $this->config->item('css_path'); ?>/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
<style>
.w3-theme {color:#fff !important;background-color:#F09300 !important}
.w3-btn {background-color:#4CAF50;margin-bottom:4px}
.w3-code{border-left:4px solid #4CAF50}
.myMenu {margin-bottom:150px}
</style>
<body>

<!-- Top -->
<div class="w3-top">
  <div class="w3-row w3-white">
    <div class="w3-half" style="margin:4px 0 6px 0"><a href='<?php echo base_url(); ?>'>
      <img width="280" height="40" src='<?php echo $this->config->item('images'); ?>logo.gif'></a></div>
      <div class="w3-half w3-wide w3-hide-medium w3-hide-small">  
      <input class="w3-input w3-right" type="text" placeholder="SEARCH" style="width:30%;"  >
    </div>
  </div>
  <ul class="w3-navbar w3-theme w3-large" style="z-index:4;">
    <li class="w3-opennav w3-left w3-hide-large">
      <a class="w3-hover-white w3-large w3-theme w3-padding-16" href="javascript:void(0)" onclick="w3_open()">☰</a>
    </li>
    <li class="w3-hide-medium w3-hide-small"><a class="w3-hover-white w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuTut')">HOME</a></li>
    <li class="w3-hide-medium w3-hide-small"><a class="w3-hover-white w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuRef')">IFSC CODE</a></li>
  </ul>
</div>

<!-- Sidenav -->
<nav class="w3-sidenav w3-collapse w3-padding w3-white w3-animate-left" style="z-index:3;width:250px" id="mySidenav">
  <div class="w3-hide-large">
    <a href="javascript:void(0)" onclick="w3_show_nav('menuTut')" class="w3-left w3-theme w3-hover-white w3-padding-16 w3-large" style="width:50%">Tutorials</a>
    
  </div>
  <div class="w3-clear"></div>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hide-large" title="close menu">×</a>
  <div id="menuTut" class="myMenu">
  <div class="w3-container w3-padding-top">
    <h3>Tutorials</h3>
  </div>
  <a href="/html/default.asp">Learn HTML</a>
  <a href="/css/default.asp">Learn CSS</a>
  <a href="/w3css/default.asp">Learn W3.CSS</a>
  <a href="/colors/default.asp">Learn Colors</a>
  <a href="/js/default.asp">Learn JavaScript</a>
  <a href="/json/default.asp">Learn JSON</a>
  <a href="/xml/default.asp">Learn XML</a>
  <a href="/ajax/default.asp">Learn AJAX</a>
  <a href="/sql/default.asp">Learn SQL</a>
  <a href="/php/default.asp">Learn PHP</a>
  </div>
  <div id="menuRef" class="myMenu w3-padding-top" style="display:none">
  <div class="w3-container">
    <h3>References</h3>
  </div>
  <a href='/tags/default.asp'>HTML Tag Reference</a>
  <a href='/tags/ref_eventattributes.asp'>HTML Event Reference</a>
  <a href='/colors/default.asp'>HTML Color Reference</a>
  <a href='/cssref/default.asp'>CSS Reference</a>
  <a href='/cssref/css_selectors.asp'>CSS Selector Reference</a>
  <a href='/w3css/w3css_references.asp'>W3.CSS Reference</a>
  <a href='/jsref/default.asp'>JavaScript Reference</a>
  <a href='/jsref/default.asp'>HTML DOM Reference</a>
  <a href='/php/php_ref_array.asp'>PHP Reference</a>
  <a href='/sql/sql_quickref.asp'>SQL Reference</a>
  </div>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 270 pixels when the sidenav is visible -->
<div class="w3-main w3-container" style="margin-left:250px;margin-top:125px;">
<div class="w3-row">
  <div class="w3-col s12 m12 l12 w3-container  w3-card-4   ">
  <form action="<?php echo $this->config->item('base_url');?>/home/get" method="post">
    <div class="w3-col s12 m12 l4 w3-padding">
    <label>Bank Name:</label>
         <select id="bank"  name="bank" class="w3-select  " onchange="this.form.submit()">
          <option value="" disabled selected>Select Bank</option>
          <?php  foreach($bank as $r): ?>
            <option <?php if($_POST){
              if($r->bank==$this->input->post('bank'))
                {echo "selected=selected";}} ?> ><?php echo $r->bank;?></option>
            <?php endforeach; ?>
          </select>
    </div>
    <div class="w3-col s12 m12 l2 w3-padding">
     <label>State Name:</label>
           <select id="state"  name="state" class="w3-select " onchange="this.form.submit()">
             <option value="" disabled selected>Select State</option>
             <?php if(isset($state)):?>
             <?php  foreach($state as $r): ?>
              <option <?php if($_POST){
                if($r->state==$this->input->post('state'))
                  {echo "selected=selected";}} ?>  ><?php echo $r->state;?></option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select> 
          </div>
          <div class="w3-col s12 m12 l2 w3-padding ">
           <label>District Name:</label>
           <select id="district"  name="district" class="w3-select " onchange="this.form.submit()">
            <option value="" disabled selected>Select district </option>
            <?php if(isset($district)):?>
              <?php  foreach($district as $r): ?>
                <option <?php if($_POST){
                if($r->district==$this->input->post('district'))
                {echo "selected=selected";}} ?>  ><?php echo $r->district;?></option>
              <?php endforeach; ?>
               <?php endif; ?>
            </select>
        </div>
        <div class="w3-col s12 m12 l2 w3-padding ">
         <label>City Name:</label>
         <select id="city" class="w3-select " name="city" onchange="this.form.submit()">
           <option value="" disabled selected>Select city </option>
           <?php if(isset($city)):?>
            <?php  foreach($city as $r): ?>
              <option <?php if($_POST){
              if($r->city==$this->input->post('city'))
              {echo "selected=selected";}} ?> ><?php echo $r->city;?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>
      <div class="w3-col s12 m12 l2 w3-padding ">
        <label>Branch Name:</label>
        <select id="branch" class="w3-select " name="branch" onchange="this.form.submit()">
          <option value="" disabled selected>Select branch </option>
          <?php if(isset($branch)):?>
          <?php  foreach($branch as $r): ?>
            <option <?php if($_POST){
            if($r->branch==$this->input->post('branch'))
            {echo "selected=selected";}} ?>  ><?php echo $r->branch;?></option>
          <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>
    </form>
  </div>
</div>

<ul class="w3-ul w3-card-4">
  <li class="w3-padding-16">
    <span onclick="this.parentElement.style.display='none'" 
    class="w3-closebtn w3-padding">x</span>
    <img src="<?php ?>" class="w3-left w3-circle" style="width:60px">
    <span class="w3-xlarge">Mike</span><br>
    <span>Web Designer</span>
  </li>
</ul>
<!-- <div class="w3-container w3-section w3-padding-large w3-card-4">
<form action="<?php echo $this->config->item('base_url');?>/home/get" method="post">
  <label>Bank Name:</label>
         <select id="bank"  name="bank" class="w3-select" onchange="this.form.submit()">
          <option value="" disabled selected>Select Bank</option>
          <?php  foreach($bank as $r): ?>
            <option <?php if($_POST){
              if($r->bank==$this->input->post('bank'))
                {echo "selected=selected";}} ?> ><?php echo $r->bank;?></option>
            <?php endforeach; ?>
          </select>

           <label>State Name:</label>
           <select id="state"  name="state" class="w3-select" onchange="this.form.submit()">
             <option value="" disabled selected>Select Bank</option>
             <?php if(isset($state)):?>
             <?php  foreach($state as $r): ?>
              <option <?php if($_POST){
                if($r->state==$this->input->post('state'))
                  {echo "selected=selected";}} ?>  ><?php echo $r->state;?></option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select> 
        
    </form>
</div>
 -->
<div class="w3-container w3-section w3-padding-large w3-card-4 ">
  <h1 class="w3-jumbo">JS</h1>
  <p class="w3-xlarge">The Language for Programming Web Pages</p>
  <a href="/js/default.asp" class="w3-btn w3-hover-white">LEARN JS</a>
  <a href="/jsref/default.asp" class="w3-btn w3-hover-white">JS REFERENCE</a>

  <p><div class="w3-code jsHigh notranslate">
   // Click the button to change the color of this paragraph<br><br>function myFunction() {<br>
      var x;<br>
      x = document.getElementById("demo");<br>
      x.style.fontSize = "25px"; <br>
      x.style.color = "red"; <br>}
  </div>
  <a class="w3-btn w3-hover-white" href="/js/tryit.asp?filename=tryjs_default" target="_blank">Try it Yourself</a>
</div>


<footer class="w3-container w3-section w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
  <p><nav>
  <a href="/forum/default.asp" target="_blank">FORUM</a> |
  <a href="/about/default.asp" target="_top">ABOUT</a>
  </nav></p>
</footer>

<!-- END MAIN -->
</div>

<script>
// Script to open and close the sidenav
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
    w3-open();
}
</script>
<script src="http://www.w3schools.com/lib/w3codecolors.js"></script>

</body>
</html>

