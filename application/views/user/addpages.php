<link rel="stylesheet" href="<?php echo base_url('public/css/addblog.css') ?>" />

<div class="login-page">
  <div class="form">
    <div id="register">Add Page</div>
    <form class="requires-validation" method="post" action="<?php echo base_url('UserController/addpage');?>">
      
      <div class="form-row">
        <div class="input">
          <label for="Title">Title: </label>
          <input type="text" name="Title" placeholder="">
          <input type="hidden" name="id" readonly/>
        </div>

        <div class="input">
          <label for="date">Date: </label>
          <input type="text" name="date" placeholder="">
        </div>
      </div>

      <div class="form-row">
        <div class="input">
          <label for="email">Email: </label>
          <input type="email" name="email" placeholder="">
        </div>

        <div class="input">
          <label for="number">Number: </label>
          <input type="text" name="number" placeholder="">
        </div>
      </div>

      <div class="input">
  <label for="gender">Gender: </label><br>
  
  <div class="gender-box">
    <div class="gender-option">
      <input type="radio" name="gender" value="male" id="male" />
      <label for="male">Male</label>
    </div>

    <div class="gender-option">
      <input type="radio" name="gender" value="female" id="female" />
      <label for="female">Female</label>
    </div>

    <div class="gender-option">
      <input type="radio" name="gender" value="other" id="other" />
      <label for="other">Others</label>
    </div>
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