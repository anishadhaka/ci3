
              <div id="form">
              <form name="simple" method="POST" action="<?php echo base_url('UserController/updateblog') ?>">
                       <div id="heading"> Update Blog Data </div>
   <!-- <?php echo '<pre>'; print_r($categories); echo '</pre>'; ?> -->
                
                       <div class="col-md-12">
                                <label class="mb-3 mr-1">Title</label>
                                <select class="form-control" id="Title" name="Title" required>
                         <?php if (!empty($categories)): ?>
                         <?php foreach ($categories as $categorys): ?>
                             <option value="<?php echo $categorys['Title']; ?>"><?php echo $categorys['Title']; ?></option>
                         <?php endforeach; ?>
                         <?php else: ?>
                         <option value="">No Categories Available</option>
                         <?php endif; ?>
                        </select>
                        </div>
                         
                         
                        <div class="col-md-12">
                        <label class="mb-3 mr-1" for="name">Name: </label>
                         <input class="form-control" type="text" name="name" placeholder="name" value="<?php echo $user['name'] ?>"/>    
                       </div></br>

                       <div class="col-md-12">
                                <label class="mb-3 mr-1" for="description">Description</label>
                                <textarea id="editor" class="form-control" type="description" name="description"value="<?php echo $user['Description']; ?>">
                                  &lt;p&gt;<?php echo $user['description'] ?>&lt;/p&gt;
                                 </textarea>
                        </div>




                      <div class="col-md-12">
                         <label class="mb-3 mr-1" for="createdate">Create Date: </label>
                          <input class="form-control" type="date" name="createdate" placeholder=""value="<?php echo $user['createdate'] ?>"/> 
                          <input class="form-control" type="hidden" name="id" placeholder=""value="<?php echo $user['id'] ?>"/> 
                          <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">   
                      </div>

                      <div class="col-md-12">
                        <label class="mb-3 mr-1" for="updatedate">Update Date: </label>
                         <input class="form-control" type="date" name="updatedate" placeholder="updatedate" value="<?php echo $user['updatedate'] ?>"/>    
                       </div></br>
                       <div class="form-button mt-3">
                           <button id="submit" type="submit" class="btn btn-primary">Update</button>
                       </div>
                     
                   </form>
        </div>
        </div>


        </div>
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
