<div id="table">
            <table> 
             <div class="top">
                <h4 class="h4">Blog categorias Data</h4>
                <a  href="<?php echo base_url('blogsite'); ?>"><i class='fas fa-eye' style='font-size:36px'></i></a>

             </div>

               <thead>
                 <tr>
                 <th>Category_id</td>
                   <th>Title</td>
                   <th>Meta Description</th>
                   <th>Meta Keyword</th>
                   <th>SEO Robat</th>
                   <th>Action</th>

                  
                 </tr>
               </thead>
               <tbody>   
                <?php foreach ($data['users'] as $user) { ?>  
                    <tr>
                    <td> <?php echo $user['category_id'] ?></td>
                       <td> <?php echo $user['Title'] ?></td>
                       <td> <?php echo $user['MetaDescription'] ?></td>
                       <td> <?php echo $user['MetaKeyword'] ?></td>
                       <td> <?php echo $user['SEO_Robat'] ?></td>
                       <td>
                          <form method="POST" action="<?php echo base_url('UserController/deleteblogcat/'.$user['category_id'] );?>">
                          <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> Delete</button>
                          <button type="submit" class="btn "><a href="<?php echo base_url('UserController/cateditdata/'.$user['category_id'] );?>"><i class="fa-solid fa-pen-to-square"></i>Update</a></button>
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

