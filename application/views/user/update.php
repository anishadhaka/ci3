
              <div id="form">
              <form name="simple" method="POST" action="<?php echo base_url('UserController/userupdatedata') ?>">
                       <div id="heading"> Update Your Data </div>

                       <div class="col-md-12">
                        <label class="mb-3 mr-1" for="name">Name: </label>
                        <input class="form-control" type="text" name="name" placeholder="Full Name" value="<?php echo $user['name'] ?>"/>
                       </div>

                       <div class="col-md-12">
                         <label class="mb-3 mr-1" for="name">Email: </label>
                          <input class="form-control" type="email" name="email" placeholder="E-mail Address"value="<?php echo $user['email'] ?>"/>      
                       </div>

                      <div class="col-md-12">
                         <label class="mb-3 mr-1" for="name">Password: </label>
                          <input class="form-control" type="password" name="password" placeholder="Password"value="<?php echo $user['password'] ?>" />    
                      </div>

                      <div class="col-md-12">
                         <label class="mb-3 mr-1" for="number">Number: </label>
                          <input class="form-control" type="text" name="number" placeholder=""value="<?php echo $user['number'] ?>"/> 
                          <input class="form-control" type="hidden" name="id" placeholder=""value="<?php echo $user['id'] ?>"/> 
                          <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">   
                      </div>

                      <div class="col-md-12">
                        <label class="mb-3 mr-1" for="city">City: </label>
                         <input class="form-control" type="text" name="city" placeholder="city" value="<?php echo $user['city'] ?>"/>    
                       </div></br>
                       <div class="form-button mt-3">
                           <button id="submit" type="submit" class="btn btn-primary">Update</button>
                       </div>
                     
                   </form>
        </div>
        </div>


        </div>
        </div>
    </div>

