<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?php echo $this->config->item('css_path'); ?>/w3css.css">
<link href="<?php echo $this->config->item('css_path'); ?>/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo $this->config->item('css_path'); ?>/custom.css" rel="stylesheet">
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
      <input class="w3-input w3-validate w3-right" type="text" placeholder="SEARCH" style="width:30%;"  >
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
    <h3>BANK</h3>
  </div>
  <a href="/html/default.asp"> IFSC CODE</a>
  <a href="/html/default.asp"> MICR CODE</a>
  <a href="/html/default.asp"> BANK BRANCH LOCATER</a>
  </div>
  <div id="menuRef" class="myMenu w3-padding-top" style="display:none">
  <div class="w3-container">
    <h3>INSURANCE</h3>
    <form id="ifsc_form" url="<?php echo base_url(); ?>">
    <input class="w3-input w3-validate" id="ifsc_search" type="text" placeholder="Enter IFSC Code" >
    </form>
  </div>
  <a href="/html/default.asp"> IFSC CODE</a>
  <a href="/html/default.asp"> MICR CODE</a>
  <a href="/html/default.asp"> BANK BRANCH LOCATER</a>
  </div>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>