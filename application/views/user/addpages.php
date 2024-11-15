  <div class="login-page">
           <div class="form">
           <div id="register">Add page </div>
           <form class="requires-validation"  method="post" action="<?php echo base_url('UserController/addpage');?>">
           <div class="input">
                <label  for="title">Title: </label>
                 <input  type="text" name="title" placeholder="" >
                </div>
                <div class="input">
                <label  for="date">Date: </label>
                <input  type="text" name="date" placeholder="" >      
                </div>
               <div class="input">
               <label  for="email">Email: </label>
                <input  type="email" name="email" placeholder="" />    
               </div>
               <div class="input">
               <label  for="number">Number: </label>
                <input  type="text" name="number" placeholder=""/>    
               </div>
               <div class="input">
               <label for="gender">gender</label><br>
               
               <label for="male">Male</label>
                <input type="radio"  name="gender" value="male"/>

                <label for="female">Female</label>
                  <input type="radio"  name="gender" value="female"/>
                  
                  <label for="others">Others</label>  
                  <input type="radio" name="gender" value="other"/>
                  
               </div>
               <div class="input">
                      <label  for="description">Decription: </label>
                      <textarea class="textarea" type="textarea" name="description" placeholder=""></textarea>   
                    </div>
               
      
                <div class="form-button mt-3">
                    <button id="submit" type="submit" class="btn btn-primary">Add</button>
                </div> 
                                   
               
    </form>
    
  </div>
</div>
