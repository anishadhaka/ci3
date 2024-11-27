
<div id="form">
              <form name="simple" method="POST" action="<?php echo base_url('UserController/updatenews') ?>">
                       <div id="heading"> Update news Data </div>

                       <div class="col-md-12">
                       <label  class="mb-3 mr-1"for="name">Name: </label>
                       <input class="form-control"  type="text" name="name" placeholder="" value="<?php echo $user['name'] ?>"/> 
                       
    
                    </div>
                         
                       <div class="col-md-12">
                         <label class="mb-3 mr-1" for="Title">Title: </label>
                         <select class="textarea" id="Title" name="Title" required>
                         <?php if (!empty($newscategories)): ?>
                         <?php foreach ($newscategories as $categorys): ?>
                             <option value="<?php echo $categorys['Title']; ?>"><?php echo $categorys['Title']; ?></option>
                         <?php endforeach; ?>
                         <?php else: ?>
                         <option value="">No Categories Available</option>
                         <?php endif; ?>
                        </select>
                          <!-- <input class="form-control" type="text" name="Title" placeholder=""value="<?php echo $user['title'] ?>"/>   -->
                          <input type="hidden"  name="id" value="<?php echo $user['id'] ?>"/>   
                       </div>
                     
                       <div class="col-md-12">
                                <label class="mb-3 mr-1" for="description">Description</label>
                                <textarea id="editor" class="form-control" type="description" name="description"value="<?php echo $user['description']; ?>">
                     &lt;p&gt;Your massage .&lt;/p&gt;
                       </textarea>
                          </div>

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
