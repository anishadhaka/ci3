<div id="table">
            <table> 
             <div class="top">
                <h4 class="h4">Blog categorias Data</h4>

             </div>

               <thead>
                 <tr>
                 <th>ID</td>
                   <th>SEO Title</td>
                   <th>Meta Description</th>
                   <th>Meta Keyword</th>
                   <th>SEO Robat</th>
                  
                 </tr>
               </thead>
               <tbody>   
                <?php foreach ($data['users'] as $user) { ?>  
                    <tr>
                    <td> <?php echo $user['id'] ?></td>
                       <td> <?php echo $user['SEO_Title'] ?></td>
                       <td> <?php echo $user['MetaDescription'] ?></td>
                       <td> <?php echo $user['MetaKeyword'] ?></td>
                       <td> <?php echo $user['SEO_Robat'] ?></td>
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

