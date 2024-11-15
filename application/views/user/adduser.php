  <div class="login-page">
           <div class="form">
           <div id="register">Add User </div>
           <form class="requires-validation"  method="post" action="<?php echo base_url('UserController/adddata');?>">
           <div class="input">
                <label  for="name">Name: </label>
                 <input  type="text" name="name" placeholder="Full Name" >
                </div>
                <div class="input">
                <label  for="name">Email: </label>
                <input  type="email" name="email" placeholder="E-mail Address" >      
                </div>
               <div class="input">
               <label  for="name">Password: </label>
                <input  type="password" name="password" placeholder="Password" />    
               </div>
               <div class="input">
               <label  for="number">Number: </label>
                <input  type="text" name="number" placeholder=""/>    
               </div>
               <div class="input">
               <label for="city">City: </label>
                <input  type="text" name="city" placeholder="city" />    
               </div></br>
               
      
                <div class="form-button mt-3">
                    <button id="submit" type="submit" class="btn btn-primary">Add</button>
                </div> 
                                   
               
    </form>
    
  </div>
</div>
