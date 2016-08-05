<!DOCTYPE html>
<html>
<title>BANK IFSC</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?php echo $this->config->item('css_path'); ?>/w3css.css">
<link href="<?php echo $this->config->item('css_path'); ?>/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo $this->config->item('css_path'); ?>/custom.css" rel="stylesheet">

<body >

<!-- Top -->
<div id="main">
<div class="w3-top">
<!-- Side Navigation mobile -->
<nav class="w3-sidenav w3-white w3-card-2 w3-hide-large" style="display:none" id="mySidenav">
<a href="javascript:void(0)" onclick="w3_close()" class="w3-xlarge w3-padding-large w3-hide-large w3-theme" title="close menu">Menu <span class="w3-right">&times;</span></a>
    <div class="inner-addon right-addon w3-padding-16">
    <input class="w3-input w3-border w3-animate-input"  id="ifsc_small"  type="text" placeholder="Enter IFSC Code" required>
    <button  class="fa fa-search w3-btn w3-theme ifsc_form"></button> 
    </div>
     
  <a href="#">Link 1</a>
  <a href="#">Link 2</a>
  <a href="#">Link 3</a>
  <a href="#">Link 4</a>
  <a href="#">Link 5</a>
</nav>
<!-- Side Navigation mobile -->


  <div class="w3-row w3-white">
    <div class="w3-half" style="margin:4px 0 6px 0"><a href='<?php echo base_url(); ?>'>
      <img width="280" height="40" src='<?php echo $this->config->item('images'); ?>logo.gif'></a></div>
      <div class="w3-half w3-wide w3-hide-medium w3-hide-small">  
      <div class="inner-addon right-addon">
      <i class="fa fa-search w3-btn w3-theme "></i>
      <input class="w3-input w3-border w3-right w3-animate-input"  type="text" placeholder="Search" style="width:30%">
     </div>
    </div>
  </div>

  <ul class="w3-navbar w3-theme w3-large" style="z-index:4;">
    <li class="w3-opennav w3-left w3-hide-large">
      <a class="w3-hover-white w3-large w3-theme w3-padding-16" href="javascript:void(0)" onclick="w3_open()">☰</a>
    </li>
    <li class="w3-hide-medium w3-hide-small"><a class="w3-hover-white w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuTut')">HOME</a></li>
    <li class="w3-hide-medium w3-hide-small"><a class="w3-hover-white w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuRef')">IFSC CODE</a></li>
  </ul>


<!-- Sidenav -->
<nav class="w3-sidenav w3-padding w3-white  w3-hide-small w3-hide-medium"  > 
  <div id="menuTut" class="myMenu">
    <div class="inner-addon right-addon">
    <button class="fa fa-search w3-btn w3-theme ifsc_form"> </button>
    <input class="w3-input w3-border w3-animate-input" id="ifsc_large" type="text" placeholder="Enter IFSC Code" required>
    </div>
  <div class="w3-container w3-padding-top">
    <h3>BANK</h3>
  </div>
  <a href="/html/default.asp"> IFSC CODE</a>
  <a href="/html/default.asp"> MICR CODE</a>
  <a href="/html/default.asp"> BANK BRANCH LOCATER</a>
  </div>
  <div id="menuRef" class="myMenu w3-padding-top" style="display:none">
  <div class="w3-container">
    <h3>INSURANCE</h3>
    
  </div>
  <a href="/html/default.asp"> IFSC CODE</a>
  <a href="/html/default.asp"> MICR CODE</a>
  <a href="/html/default.asp"> BANK BRANCH LOCATER</a>
  </div>
</nav>
 </div>

<input type="hidden" id="url" value="<?php echo base_url(); ?>">