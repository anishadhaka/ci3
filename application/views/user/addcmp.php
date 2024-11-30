
<div id="form">
              <form name="simple" method="POST" action="<?php echo base_url('Welcome/add') ?>">
                 <div id="heading"> Add Company Data </div>

                 <div class="col-md-12">
                        <label class="mb-3 mr-1" for="company_id">company_id: </label>
                        <input class="form-control" type="number" name="company_id" placeholder="" value=""/>
                       </div>    

                       <div class="col-md-12">
                        <label class="mb-3 mr-1" for="company_name">company_name: </label>
                        <input class="form-control" type="hidden" name="id" placeholder=" " value=""/>
                        <input class="form-control" type="text" name="company_name" placeholder="Full Name" value=""/>
                       </div>

                       <div class="col-md-12">
                         <label class="mb-3 mr-1" for="company_type">company_type: </label>
                          <input class="form-control" type="text" name="company_type" placeholder=""value=""/>      
                       </div>

                      <div class="col-md-12">
                         <label class="mb-3 mr-1" for="company_email">company_email: </label>
                          <input class="form-control" type="email" name="company_email" placeholder=""value="" />    
                      </div>

                      <div class="form-button mt-3">
                         <button id="submit" type="submit" class="btn btn-primary">Added</button>
                       </div>
                     
                   </form>
                </div>
        </div>




