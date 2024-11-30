<link rel="stylesheet" href="<?php echo base_url('public/css/addblog.css') ?>" />

<div class="login-page">
  <div class="form">
    <div id="register">Add Blog</div>
    <form class="requires-validation" method="post" action="<?php echo base_url('UserController/addblogdata');?>">
      
      <div class="form-row">
      <div class="input">
             <label>Title</label>
             <select class="textarea" id="Title" name="Title" required>
             <?php if (!empty($category)): ?>
             <?php foreach ($category as $categorys): ?>
                 <option value="<?php echo $categorys['Title']; ?>"><?php echo $categorys['Title']; ?></option>
             <?php endforeach; ?>
             <?php else: ?>
             <option value="">No Categories Available</option>
             <?php endif; ?>
            </select>
          </div>
        
        <div class="input">
          <label for="name">Name: </label>
          <input type="text" name="name" placeholder=""/>    
        </div>
      </div>

      <div class="form-row">
        <div class="input">
          <label for="description">Description: </label>
          <textarea  class="textarea" name="description" placeholder=""></textarea>   
        </div>
      </div>

      <div class="form-row">
        <div class="input">
          <label for="createdate">Create Date: </label>
          <input type="date" name="createdate" placeholder=""/>    
        </div>

        <div class="input">
          <label for="updatedate">Update Date: </label>
          <input type="date" name="updatedate" placeholder="" />    
        </div>
      </div>

      <div class="form-row">
        <div class="input full-width">
          <label for="image">Upload Image:</label><br>
          <input type="file" name="image" accept="image/*"><br><br>
        </div>
      </div>

      <div class="form-button mt-3">
        <button id="submit" type="submit" class="btn btn-primary">Add</button>
      </div>

    </form>
  </div>
</div>