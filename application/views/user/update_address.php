
<div id="form">
              <form name="simple" method="POST" action="<?php echo base_url('Welcome/companyupdatedata2') ?>">
                 <div id="heading"> Update Company Data </div>
                       
              
                       <div class="input-group">
                    <label>company_id</label>
                    <input type="number" id="company_id" name="company_id" value="<?php echo $user['company_id']; ?>" >
                </div>

                <div class="input-group">
                    <label>Address</label>
                    <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" >
                     <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
                </div>
                <div class="input-group">
                    <label>Mobile</label><br>
                    <input type="number" id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>"> 
                </div>

                <div class="input-group">
                    <label>Latitude</label>
                    <input type="number" id="latitude" name="latitude"  value="<?php echo $user['latitude']; ?>">
                </div>
                <div class="input-group">
                    <label>longitute</label>
                    <input type="number" id="longitute" name="longitute" value="<?php echo $user['longitute']; ?>">
                </div>
                <button> update </button>
            </div>
            </form>
                </div>
        </div>




