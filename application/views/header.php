<!DOCTYPE html>
<html>
<title>Bank Ifsc Code</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path'); ?>/w3css.css">
<link href="<?php echo $this->config->item('css_path'); ?>/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo $this->config->item('css_path'); ?>/custom.css" rel="stylesheet">
<body >
  <!-- Top -->
  
    <div class="w3-top">
      <!-- Side Navigation mobile -->
      <nav class="w3-sidenav w3-white w3-card-2 w3-hide-large " style="display:none" id="mySidenav">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-xlarge w3-padding-large w3-hide-large w3-theme" title="close menu">Menu <span class="w3-right">&times;</span></a>
        <div class="inner-addon right-addon w3-padding-16">
          <input class="w3-input w3-border w3-animate-input "  id="ifsc_small"  type="text" placeholder="Enter Ifsc-Micr Code" required>
          <button  class="fa fa-search w3-btn w3-theme ifsc_form" style="top: 16px;"></button> 
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
            <div class="inner-addon right-addon w3-padding-8">
              <form>    
                <button class="fa fa-search w3-btn  w3-theme ifsc_form" type="submit"> </button>
                <input class="w3-input w3-border w3-right ifsc_form " id="ifsc_large" type="text"  placeholder="Search Bank By IFSC/MICR Code" style="width:50%" >
              </form>
            </div>
          </div>
        </div>
        <ul class="w3-navbar w3-theme w3-large" style="z-index:4;">
          <li class="w3-opennav w3-left w3-hide-large">
            <a class="w3-hover-white w3-large w3-theme w3-padding-16" href="javascript:void(0)" onclick="w3_open()">☰</a>
          </li>
          <li class="w3-hide-medium w3-hide-small"><a class="w3-hover-white w3-padding-16" href="<?php echo base_url(); ?>">HOME</a></li>
          <li class="w3-hide-medium w3-hide-small" onclick="attention('ifsc_large')"><a class="w3-hover-white w3-padding-16" href="javascript:void(0)" >Search By IFSC Code</a></li>
          <li class="w3-hide-medium w3-hide-small" onclick="attention('ifsc_large')"><a class="w3-hover-white w3-padding-16" href="javascript:void(0)" >Search By MICR Code</a></li>
          <li class="w3-hide-medium w3-hide-small"><a class="w3-hover-white w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuRef')">FAQ</a></li>
        </ul>
        <!-- Sidenav -->
        <nav class="w3-sidenav w3-padding w3-white  w3-hide-small w3-hide-medium" style="width:257px;" > 
          <div id="menuTut" class="myMenu">
            <div class="w3-container w3-padding-top">
              <h3>BANK</h3>
            </div>
            <a href="/html/default.asp"> IFSC CODE</a>
            <a href="/html/default.asp"> MICR CODE</a>
            <a href="/html/default.asp"> BANK BRANCH LOCATER</a>
          </div>
          <div id="menuRef" class="myMenu w3-padding-top" style="display:none">
           <div class="w3-accordion w3-light-grey">
            <button onclick="accordion('Demo1')" class="w3-btn-block w3-theme w3-left-align">What is IFSC Code?</button>
            <div id="Demo1" class="w3-accordion-content  w3-animate-zoom w3-container w3-show">
              <p>Indian Financial System Code (IFSC). It is used for electronic payment applications like Real Time Gross Settlement (RTGS), National Electronic Funds Transfer (NEFT), Immediate Payment Service, an interbank electronic instant mobile money transfer service (IMPS), and Centralised Funds Management System (CFMS) developed by Reserve Bank of India (RBI). Code has eleven characters "Alpha Numeric" in nature. First four characters represent bank, fifth character is default "0" left for future use and last six characters represent branch.</p>
            </div>
            <button onclick="accordion('Demo2')" class="w3-btn-block w3-theme w3-left-align">What is MICR Code?</button>
            <div id="Demo2" class="w3-accordion-content w3-container">
             <p>Magnetic Ink Character Recognition as printed on cheque book to facilitate the processing of cheques.</p>
           </div>
         </div>
       </div>
     </nav>
   </div>


 <input type="hidden" id="url" value="<?php echo base_url(); ?>">
