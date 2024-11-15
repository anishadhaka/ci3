
<div id="table">
            <table> 
              <div class="top">
                <h4 class="h4">Pages Data
                <a class="adduser"href="<?php echo base_url('UserController/addpages');?>">Add Page<a></h4>
                <div>
               <thead>
                 <tr>
                   <th>id</td>
                   <th>Title</th>
                   <th>Date</th>
                   <th>Email</th>
                   <th>Number</th>
                   <th>Gender</th>
                   <th>Description</th>
                   <th>Action<th>
                 </tr>
               </thead>
               <tbody>   


                <?php foreach ($data['users'] as $user) { ?>  
                    <tr>
                   <!-- <?php  print_r($data['users']); ?> -->
                       <td> <?php echo $user['id'] ?></td>
                       <td> <?php echo $user['title'] ?></td>
                       <td> <?php echo $user['date'] ?></td>
                       <td> <?php echo $user['email'] ?></td>
                       <td> <?php echo $user['number'] ?></td>
                       <td> <?php echo $user['gender'] ?></td>
                       <td> <?php echo $user['description'] ?></td>     
                       <td>
                          <form method="DELETE" action="<?php echo base_url('UserController/deletepages/'.$user['id'] );?>">
                          <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                          <button type="submit" class="btn "><a href="<?php echo base_url('UserController/editpage/'.$user['id'] );?>"><i class="fa-solid fa-pen-to-square"></i>Update</a></button>
                          
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

