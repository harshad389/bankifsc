<div class="w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main w3-container w3-padding-top" id="main" style="margin-left:250px;margin-top:100px;">
  <div class="w3-row ">
    <div class="w3-row" id="ifsc_result">
    </div>
    <br>
    <div class="w3-col s12 m12 l12 w3-card-4  ">
     <header class="w3-container w3-light-grey">
      <h3 >SEARCH IFSC CODE</h3>
    </header> 
    <form id="select_form" action="<?php echo $this->config->item('base_url');?>" method="post">
      <div class="w3-col s12 m12 l4 w3-padding">
        <label>Bank Name:</label>
        <select id="bank"   name="bank" class="w3-select " onchange="this.form.submit()" >
          <option value="" disabled selected>Select Bank</option>
          <?php  foreach($bank as $r): ?>
            <option <?php if($_POST){
              if($r->bank==$this->input->post('bank'))
                {echo "selected=selected"; }} ?> ><?php echo $r->bank;?></option>
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
    <br>
    <div class="w3-row" id="ifsc_result">

    </div>

    <?php if(isset($detail)): ?>
      <br>
      <!-- row start 2 -->
      <div class="w3-row" id="bank_detail">
        <!-- bank detail -->
        <div class="w3-col m12 s12 l8 w3-animate-zoom" >
          <div class="w3-card-4  ">
            <header class="w3-container w3-light-grey">
              <h3 ><?php echo $detail['bank']; ?></h3>
            </header>      
            <ul class="w3-ul">     
              <li class="w3-padding w3-hover-light-grey w3-tooltip" >
                IFSC CODE:<?php echo $detail['ifsc']; ?>
                <button class="w3-btn w3-text  " onclick="copy(this)" data-clipboard-text="<?php echo $detail['ifsc']; ?>">Copy</button>

              </li>
              <li class="w3-padding w3-hover-light-grey w3-tooltip">
                MICR CODE:<?php echo $detail['micr']; ?>
                <button class="w3-btn w3-text  " onclick="copy(this)"  data-clipboard-text="<?php echo $detail['micr']; ?>">Copy</button>

              </li>
              <li class="w3-padding w3-hover-light-grey ">
                BRANCH NAME:<?php echo $detail['branch']; ?>
              </li>
              <li class="w3-padding w3-hover-light-grey">
                ADDRESS:<?php echo $detail['address']; ?>
              </li>
              <li class="w3-padding w3-hover-light-grey">
                CONTACT NUMBER:<?php echo $detail['contact']; ?>
              </li>
            </ul>
          </div>
        </div>


        <!-- //Bank detail -->
        <div class="w3-col m12 s12 l4 w3-padding-left w3-hide-small w3-hide-medium" >
          <div class=" w3-card-4 w3-center ">
            <img class="w3-center" width="300" height="250" src="<?php echo $this->config->item('images'); ?>banner.png">
          </div>
        </div>

      </div>
    <?php endif; ?>
    <!-- row 2 complete -->

    <?php if( isset($bank) && empty($state)): ?>
      <br>
      <div class="w3-row">
       <div class="w3-card-4 w3-animate-zoom">
         <header class="w3-container w3-light-grey">
          <h3 >BANK LIST</h3>
        </header>
        <ul class="w3-ul w3-border">
         <?php foreach($bank as $banklist): ?>  
           <li class="w3-hover-light-grey"  onclick="list_submit('bank','<?php echo $banklist->bank; ?>')"><?php echo $banklist->bank; ?></li>
         <?php endforeach; ?>
       </ul>
     </div>
   </div>



 <?php elseif(isset($state) &&  empty($district) ): ?>
  <br>

  <div class="w3-row">
   <div class="w3-card-4 w3-animate-zoom">
     <header class="w3-container w3-light-grey">
      <h3 >STATE LIST</h3>
    </header>

    <ul class="w3-ul w3-border">
     <?php foreach($state as $statelist): ?>
       <li class="w3-hover-light-grey"  onclick="list_submit('state','<?php echo $statelist->state; ?>')"><?php echo $statelist->state; ?></li>
     <?php endforeach; ?>
   </ul>

 </div>
</div>



<?php elseif(isset($district) &&  empty($city) ): ?>
  <br>
  <div class="w3-row">
   <div class="w3-card-4 w3-animate-zoom">
     <header class="w3-container w3-light-grey">
      <h3 >DISTRICT LIST</h3>
    </header>

    <ul class="w3-ul w3-border">
     <?php foreach($district as $districtlist): ?>
       <li class="w3-hover-light-grey"  onclick="list_submit('district','<?php echo $districtlist->district; ?>')"><?php echo $districtlist->district; ?></li>
     <?php endforeach; ?>
   </ul>

 </div>
</div>


<?php elseif(isset($city) &&  empty($branch) ): ?>
  <br>
  <div class="w3-row">
   <div class="w3-card-4 w3-animate-zoom">
     <header class="w3-container w3-light-grey">
      <h3 >CITY LIST</h3>
    </header>

    <ul class="w3-ul w3-border">
     <?php foreach($city as $citylist): ?>
       <li class="w3-hover-light-grey" onclick="list_submit('city','<?php echo $citylist->city; ?>')"><?php echo $citylist->city; ?></li>
     <?php endforeach; ?>
   </ul>

 </div>
</div>


<?php else: ?>
  <br>
  <div class="w3-row">
   <div class="w3-card-4 w3-animate-zoom">
     <header class="w3-container w3-light-grey">
      <h3 >BRANCH LIST</h3>
    </header>

    <ul class="w3-ul w3-border">
     <?php foreach($branch as $branchlist): ?>
       <li class="w3-hover-light-grey" onclick="list_submit('branch','<?php echo $branchlist->branch; ?>')"><?php echo $branchlist->branch; ?></li>
     <?php endforeach; ?>
   </ul>

 </div>
</div>
<?php endif; ?>
<br>

</div>




