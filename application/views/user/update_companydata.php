
<div id="form">
              <form name="simple" method="POST" action="<?php echo base_url('Welcome/companyupdatedata') ?>">
                 <div id="heading"> Update Company Data </div>
                       
                 <div class="col-md-12">
                        <label class="mb-3 mr-1" for="company_id">company_id: </label>
                        <input class="form-control" type="number" name="company_id" placeholder="" value="<?php echo $user['company_id'] ?>"/>
                       </div> 

                       <div class="col-md-12">
                        <label class="mb-3 mr-1" for="company_name">company_name: </label>
                        <input class="form-control" type="hidden" name="id" placeholder=" " value="<?php echo $user['id'] ?>"/>
                        <input class="form-control" type="text" name="company_name" placeholder="Full Name" value="<?php echo $user['company_name'] ?>"/>
                       </div>

                       <div class="col-md-12">
                         <label class="mb-3 mr-1" for="company_type">company_type: </label>
                          <input class="form-control" type="text" name="company_type" placeholder=""value="<?php echo $user['company_type'] ?>"/>      
                       </div>

                      <div class="col-md-12">
                         <label class="mb-3 mr-1" for="company_email">company_email: </label>
                          <input class="form-control" type="email" name="company_email" placeholder=""value="<?php echo $user['company_email'] ?>" />    
                      </div>

                      <div class="form-button mt-3">
                         <button id="submit" type="submit" class="btn btn-primary">Update</button>
                       </div>
                     
                   </form>
                </div>
        </div>




