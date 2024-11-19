
                
                <div class="form">
                     <h2 class="h2">Change Your Password</h2>
                   <div class="inputform">

            <?php if ($this->session->flashdata('message')): ?>
                <p style="color: green;"><?php echo $this->session->flashdata('message'); ?></p>
            <?php endif; ?>
            
            <?php if ($this->session->flashdata('error')): ?>
                <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
            <?php endif; ?>
            <?php 
        $user_id = isset($user_id) ? $user_id : $this->session->flashdata('user_id');
        ?>
            <?php echo form_open('userpass'); ?>
            
                <label for="old_password">Old Password:</label><br>
                <input type="password" name="old_password" ><br><br>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" readonly/>
            
                <label for="new_password">New Password:</label><br>
                <input type="password" name="new_password" ><br><br>
            
                <label for="confirm_password">Confirm New Password:</label><br>
                <input type="password" name="confirm_password" ><br><br>
            
                <button type="submit">Change Password</button>
            
            <?php echo form_close(); ?>
         </div>
         </div>
     </div>
   </div>
   </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
