
              <div id="table">
            <table> 
              <div class="top">
                <h4 class="h4">User Data
                <a class="adduser"href="<?php echo base_url('UserController/adduser');?>">Add User<a></h4>
                <div>
               <thead>
                 <tr>
                   <th>id</td>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Password</th>
                   <th>Number</th>
                   <th>City</th>
                   <th>Actions</th>
                 </tr>
               </thead>
               <tbody>   


                <?php foreach ($data['users'] as $user) { ?>  
                    <tr>
                       <td> <?php echo $user['id'] ?></td>
                       <td> <?php echo $user['name'] ?></td>
                       <td> <?php echo $user['email'] ?></td>
                       <td> <?php echo $user['password'] ?></td>
                       <td> <?php echo $user['number'] ?></td>
                       <td> <?php echo $user['city'] ?></td>     
                       <td>
                          <form method="DELETE" action="<?php echo base_url('UserController/delete/'.$user['id'] );?>">
                          <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                          <button type="submit" class="btn "><a href="<?php echo base_url('UserController/usereditdata/'.$user['id'] );?>"><i class="fa-solid fa-pen-to-square"></i>Update</a></button>
                          <button type="submit" class="btn  "> <a href="<?php echo base_url('password_page/' . $user['id'] ); ?>"><i class='fas fa-lock' style='font-size:24px'></i>password</a></button>  
                        </form>
                       </td>
                    </tr>
                     <?php } 
                     ?>
        </tbody>
        </table>
        <div class="pagination-links">
            <?php echo $data['links']; ?>  
        </div>
        </div>
        </div>
       

        </div>
        </div>
    </div>

