<div class="card col s12 m6 ">
        <div class="card-content">
          <span class="card-title">Search Ifsc Code</span>
          <form action="<?php echo $this->config->item('base_url');?>home" method="post">
            <select id="bank"  name="bank" onchange="this.form.submit()">
              <option value="" disabled selected>Select Bank</option>
              <?php  foreach($bank as $r): ?>
                <option <?php if($_POST){
                  if($r->bank==$this->input->post('bank'))
                    {echo "selected=selected";}} ?> ><?php echo $r->bank;?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>STATE</label>
              <select id="state"  name="state" onchange="this.form.submit()">
               <option value="" disabled selected>Select Bank</option>
               <?php if(isset($state)):?>
                <?php  foreach($state as $r): ?>
                  <option <?php if($_POST){
                    if($r->state==$this->input->post('state'))
                      {echo "selected=selected";}} ?>  ><?php echo $r->state;?></option>

                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
              <br>
              <label>DISTRICT</label>
              <select id="district"  name="district" onchange="this.form.submit()">
                <option>Select district </option>
                <?php if(isset($district)):?>
                  <?php  foreach($district as $r): ?>
                    <option <?php if($_POST){
                      if($r->district==$this->input->post('district'))
                        {echo "selected=selected";}} ?>  ><?php echo $r->district;?></option>

                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
                <br>
                <label>CITY</label>
                <select id="city" class="form-control" name="city" onchange="this.form.submit()">
                  <option>Select city </option>
                  <?php if(isset($city)):?>
                    <?php  foreach($city as $r): ?>
                      <option <?php if($_POST){
                        if($r->city==$this->input->post('city'))
                          {echo "selected=selected";}} ?> ><?php echo $r->city;?></option>

                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                  <br/>
                  <label>BRANCH</label>
                  <select id="branch" class="form-control" name="branch" onchange="this.form.submit()">
                    <option>Select branch </option>
                    <?php if(isset($branch)):?>
                      <?php  foreach($branch as $r): ?>
                        <option <?php if($_POST){
                          if($r->branch==$this->input->post('branch'))
                            {echo "selected=selected";}} ?>  ><?php echo $r->branch;?></option>

                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </form>
                </div>

              </div>