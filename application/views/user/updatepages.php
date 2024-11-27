<div class="login-page">
           <div class="form">
           <div id="register">Update page </div>
           <form class="requires-validation"  method="post" action="<?php echo base_url('UserController/updatepage');?>">
           <div class="input">
                <label  for="Title">Title: </label>
                 <input  type="text" name="Title" placeholder="" value="<?php echo $user['Title'] ?>">
                 <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">   
                </div>
                <div class="input">
                <label  for="date">Date: </label>
                <input  type="date" name="date" placeholder=""value="<?php echo $user['date'] ?>" >      
                </div>
               <div class="input">
               <label  for="email">Email: </label>
                <input  type="email" name="email" placeholder=""value="<?php echo $user['email'] ?>" />    
               </div>
               <div class="input">
               <label  for="number">Number: </label>
                <input  type="text" name="number" placeholder="" value="<?php echo $user['number'] ?>"/>    
               </div>
               <div class="input">
               <label for="gender">gender</label><br>
               
               <label for="male">Male</label>
                <input type="radio"  name="gender" value="<?php echo $user['gender'] ?>"/>

                <label for="female">Female</label>
                  <input type="radio"  name="gender" value="<?php echo $user['gender'] ?>"/>
                  
                  <label for="others">Others</label>  
                  <input type="radio" name="gender" value="<?php echo $user['gender'] ?>"/>
                  
               </div>
               <div class="input">
                      <label  for="description">Decription: </label>
                      <textarea class="textarea" type="textarea" name="description"  value="<?php echo $user['description'] ?>">
                      &lt;p&gt;Your massage .&lt;/p&gt;
                      </textarea>   
                    </div>
               
      
                <div class="form-button mt-3">
                    <button id="submit" type="submit" class="btn btn-primary">Update</button>
                </div> 
                                   
               
    </form>
    
  </div>
</div>
<script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
            editor.resize(300, 500);
            </script>
            <script>
            CKEDITOR.replace('editor')
           </script>

