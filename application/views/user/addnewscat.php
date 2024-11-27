
<link rel="stylesheet" href="<?php echo base_url('public/css/addblog.css') ?>" />

<div class="login-page">
  <div class="form">
    <div id="register">Add Categorias</div>
    <form class="requires-validation" method="post" action="<?php echo base_url('UserController/addnewscategories');?>">
      
      <div class="form-row">
        <div class="input">
          <label for="Title"> Title: </label>
          <input type="text" name="Title" placeholder="">
          <input type="hidden" name="id" readonly/>
        </div>

        <div class="input">
          <label for="MetaDescription">Meta Description: </label>
          <input type="text" name="MetaDescription" placeholder="">      
        </div>
      </div>

      <div class="form-row">
        <div class="input">
          <label for="MetaKeyword">Meta Keyword: </label>
          <input type="text" name="MetaKeyword" placeholder="">      
        </div>

        <div class="input">
          <label for="SEO_Robat">SEO Robat: </label>
          <input type="text" name="SEO_Robat" placeholder="">      
        </div>
      </div>

      <div class="form-row">
        <div class="input full-width">
          <label for="description">Description: </label>
          <textarea class="textarea" name="description" placeholder=""></textarea>   
        </div>
      </div>

      <div class="form-button mt-3">
        <button id="submit" type="submit" class="btn btn-primary">Add</button>
      </div>

    </form>
  </div>
</div>