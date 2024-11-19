
      <div class="login-page">
        <div class="form">
          <div id="register">Add Blog </div>
           <form class="requires-validation"  method="post" action="<?php echo base_url('UserController/addblogdata');?>">
                    <div class="input">
                           <label  for="name">Name: </label>
                           <input  type="text" name="name" placeholder="Full Name" >
                    </div>

                    <div class="input">
                       <label  for="title">Title: </label>
                       <input  type="text" name="title" placeholder="" >      
                    </div>
                     
                    <div class="input">
                       <label  for=" SEO_Title">SEO Title: </label>
                       <input  type="text" name="SEO_Title" placeholder="" >      
                    </div>

                    <div class="input">
                       <label  for="MetaDescription">MetaDescription: </label>
                       <input  type="text" name="MetaDescription" placeholder="" >      
                    </div>

                    <div class="input">
                       <label  for="MetaKeyword">MetaKeyword: </label>
                       <input  type="text" name="MetaKeyword" placeholder="" >      
                    </div>

                    <div class="input">
                       <label  for="SEO_Robat">SEO Robat: </label>
                       <input  type="text" name="SEO_Robat" placeholder="" >      
                    </div>

                    <div class="input">
                      <label  for="description">Decription: </label>
                      <textarea class="textarea" type="textarea" name="description" placeholder=""></textarea>   
                    </div>

                    <div class="input">
                      <label  for="createdate">Create Date: </label>
                       <input  type="date" name="createdate" placeholder=""/>    
                    </div>

                    <div class="input">
                      <label for="createdate">Update Date: </label>
                       <input  type="date" name="updatedate" placeholder="" />    
                    </div></br>
                    
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
