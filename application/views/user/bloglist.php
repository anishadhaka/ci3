    <div id="table">
            <table> 
             <div class="top">
                <h4 class="h4">Blog Data</h4>
                <div class="button ">
               
                <h4 class="add"><a  href="<?php echo base_url('UserController/addblog');?>" >Add Blog<a>
                <a href="<?php echo base_url('UserController/recycleblog');?>">Recycle Blog<a>
                <a  href="<?php echo base_url('blogsite'); ?>"><i class='fas fa-eye' style='font-size:36px'></i></a>
                </h4>
               
               </div>
             </div>

               <thead>
                 <tr>
                   <th>id</td>
                   <th>Name</th>
                   <th>Title</th>
                   <th>Description</th>
                   <th>Create Date</th>
                   <th>Update Date</th>
                   <th>image</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>   
                <?php foreach ($data['users'] as $user) { ?>  
                    <tr>
                       <td> <?php echo $user['id'] ?></td>
                       <td> <?php echo $user['name'] ?></td>
                       <td> <?php echo $user['title'] ?></td>
                       <td> <?php echo $user['description'] ?></td>
                       <td> <?php echo $user['createdate'] ?></td>
                       <td> <?php echo $user['updatedate'] ?></td>  
           
                <td>
                <?php if (!empty($user['image'])): ?>
                    <img src="<?php echo base_url('uploads/images/' . $user['image']); ?>" alt="Blog Image" height="70">
                <?php else: ?>
                    <span>No Image</span>
                <?php endif; ?>
                </td>
                 
                       <td>
                          <form method="POST" action="<?php echo base_url('UserController/deleteblog/'.$user['id'] );?>">
                          <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> Delete</button>
                          <button type="submit" class="btn "><a href="<?php echo base_url('UserController/editblog/'.$user['id'] );?>"><i class="fa-solid fa-pen-to-square"></i>Update</a></button>
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

