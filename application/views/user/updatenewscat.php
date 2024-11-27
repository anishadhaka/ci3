
<div id="form">
              <form name="simple" method="POST" action="<?php echo base_url('UserController/newscatupdate') ?>">
                       <div id="heading"> Update news category </div>
                 
                   

                       <div class="col-md-12">
                       <label  class="mb-3 mr-1"for="Title">Title: </label>
                       <input class="form-control"  type="text" name="Title" placeholder="" value="<?php echo $user['Title'] ?>"/> 
                       <input class="form-control" type="hidden" name="category_id" placeholder=""value="<?php echo $user['category_id'] ?>"/> 
    
                    </div>
                    
                    <div class="col-md-12">
                                <label class="mb-3 mr-1" for="MetaDescription">MetaDescription</label>
                                <textarea id="editor" class="form-control" type="description" name="MetaDescription"value="<?php echo $user['MetaDescription']; ?>">
                     <!-- &lt;p&gt;<?php echo $user['MetaDescription'] ?>&lt;/p&gt; -->
                       </textarea>
                          </div>

                  

                    <div class="col-md-12">
                       <label class="mb-3 mr-1" for="MetaKeyword">MetaKeyword: </label>
                       <input class="form-control"  type="text" name="MetaKeyword" placeholder=""value="<?php echo $user['MetaKeyword'] ?>"/>      
                    </div>

                    <div class="col-md-12">
                       <label class="mb-3 mr-1" for="SEO_Robat">SEO_Robat: </label>
                       <input class="form-control"   type="text" name="SEO_Robat" placeholder=""value="<?php echo $user['SEO_Robat'] ?>"/>      
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
    <!-- <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
            editor.resize(300, 500);
            </script>
            <script>
            CKEDITOR.replace('editor')
           </script> -->
