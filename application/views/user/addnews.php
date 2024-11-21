
<div class="login-page">
        <div class="form">
          <div id="register">Add News </div>
           <form class="requires-validation"  method="post" action="<?php echo base_url('UserController/addnewsdata');?>">
                 
                    <div class="input">
                       <label  for="Title">Title: </label>
                       <input  type="text" name="Title" placeholder="" >      
                    </div>

                    <div class="input">
                      <label  for="description">Decription: </label>
                      <textarea class="textarea" type="textarea" name="description" placeholder=""></textarea>   
                    </div>


                    
                    <div class="input">
                    <label for="image">Upload Image:</label><br>
                    <input type="file" name="image" accept="image/*"><br><br>
                    </div></br>

                    <div class="form-button mt-3">
                           <button id="submit" type="submit" class="btn btn-primary">Add</button>
                    </div>           
            </form>
    
          </div>
       </div>
